<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Movie; // Movie Model for if I need

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $movies = Movie::all();
        return view('home', compact('movies'));

        /*$movies = [
            [
                'id' => 1,
                'title' => 'Movie 1',
                'description' => 'This is the first movie.',
            ],
            [
                'id' => 2,
                'title' => 'Movie 2',
                'description' => 'This is the second movie.',
            ],
            [
                'id' => 3,
                'title' => 'Movie 3',
                'description' => 'This is the third movie.',
            ],
            [
                'id' => 4,
                'title' => 'Movie 4',
                'description' => 'This is the third movie.',
            ],
            // Add more movie entries as needed
        ];
        return view('home', compact('movies'));
        */
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('create_form');
    }

    /**
     * Store a newly created resource in storage.
     */
    /**
     * Store a newly created resource in storage.
     */
    /**
     * Store a newly created resource in storage.
     */
    /*
 public function store(Request $request)
 {
  // Validation
     $request->validate([
         'title' => 'required|string|max:255',
         'description' => 'required|string',
         // Add more validation rules for other movie fields
     ]);

     // Get the current movies
     $movies = $this->getMovies();

     // Create a new movie with an ID based on the count of movies
     $newMovie = [
         'id' => count($movies) + 1,
         'title' => $request->input('title'),
         'description' => $request->input('description'),

         // Add more fields as needed
     ];

     // Add the new movie to the movies array
     $movies[] = $newMovie;

     // Update the movies and add the new movie in the session
    // session(['movies' => $movies, 'addedMovies' => [$newMovie]]);
     // Update the movies in the session
     session(['movies' => $movies]);
     // Redirect to home page with success message
     return redirect()->route('home')->with('success', 'Movie created successfully!');


    */

    //Database method
    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            //'director' => 'required|string', // Add other validation rules for new fields
        ]);

        // Create a new movie using mass assignment
        Movie::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            //'director' => $request->input('director'), // Add other fields as needed
        ]);

        // Redirect to home page with success message
        return redirect()->route('home')->with('success', 'Movie created successfully!');
    }



        /*// Validation
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            // Add more validation rules for other movie fields
        ]);

        // Create new movie
        $movies = $this->getMovies();
        $newMovie = [
            'id' => count($movies) + 1, // Generate a new ID (replace this if you have a better way)
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            // Add more fields as needed
        ];
        $movies[] = $newMovie;


        return redirect()->route('home')->with('success', 'Movie added successfully!');
    }

    */
    /**
     * Display the specified resource.
     */

    //Database method
    public function show(string $id)
    {
        $movie = Movie::find($id);
        dd($movie); // This line will dump the contents of $movie for debugging purposes
        return view("form{$id}");
    }

    /**
     * Show the form for editing the specified resource.
     */
    /*
    public function edit(string $id)
    {
        $movie = $this->findMovieById($id);
        $movies = $this->getMovies();

        return view('edit_form', compact('movie', 'movies'));
    }
    */
    public function edit($id)
    {
        $movie = Movie::findOrFail($id);
        $movies = Movie::all();

        return view('edit_form', compact('movie', 'movies'));
    }


    /**
     * Update the specified resource in storage.
     */

    /*
    public function update(Request $request, string $id)
    {
        // Validation
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            // Add more validation rules for other movie fields
        ]);

        // Update movie based on $id
        $movies = $this->getMovies();
        $key = $this->findMovieKeyById($movies, $id);

        if ($key !== false) {
            // Create an updated movie array
            $updatedMovie = [
                'id' => $id,
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                // Add other fields as needed
            ];

            // Check if there are updated movies in the session
            $updatedMovies = session('updatedMovies', []);

            // Add the updated movie to the list
            $updatedMovies[$id] = $updatedMovie;

            // Update the movies in the session
            session(['movies' => $movies, 'updatedMovies' => $updatedMovies]);

            // Redirect to home page with success message
            return redirect()->route('home')->with('success', 'Movie updated successfully!');
        }

        abort(404); // Movie not found
    }
*/
    //Database method
    public function update(Request $request, $id)
    {
        // Validation
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            // Add more validation rules for other movie fields
        ]);

        // Update movie based on $id
        $movie = Movie::findOrFail($id);
        $movie->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            // Add other fields as needed
        ]);

        // Redirect to home page with success message
        return redirect()->route('home')->with('success', 'Movie updated successfully!');
    }


    /*
        public function update(Request $request, string $id)
        {
            // Validation
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                // Add more validation rules for other movie fields
            ]);

            // Update movie based on $id
            $movies = $this->getMovies();
            $key = $this->findMovieKeyById($movies, $id);

            if ($key !== false) {
                $movies[$key]['title'] = $request->input('title');
                $movies[$key]['description'] = $request->input('description');
                // Update other fields as needed

                // Save the updated movies array in the session
                session(['movies' => $movies]);

                // Handle updated movies and redirect to home
                $this->handleUpdatedMovies($request, $movies);

                return redirect()->route('home')->with('success', 'Movie updated successfully!');
            }

            abort(404); // Movie not found
        }

        private function handleUpdatedMovies(Request $request, $movies)
        {
            // Check if updated movies are submitted
            if ($request->has('updatedMovies')) {
                $updatedMovies = json_decode($request->input('updatedMovies'), true);

                // Update the movies in the session
                session(['movies' => $updatedMovies]);
            }
        }
    */






    /**
     * Remove the specified resource from storage.
     */
    /*
    public function destroy(string $id)
    {
        $movies = $this->getMovies();
        $key = $this->findMovieKeyById($movies, $id);

        if ($key !== false) {
            // Retrieve the deleted movie for display on the home page
            $deletedMovie = $movies[$key];

            // Remove the movie from the movies array
            unset($movies[$key]);

            // Check if there are deleted movies in the session
            $deletedMovies = session('deletedMovies', []);

            // Add the deleted movie to the list
            $deletedMovies[$id] = $deletedMovie;

            // Update the movies and deleted movies in the session
            session(['movies' => $movies, 'deletedMovies' => $deletedMovies]);

            // Redirect to home page with success message
            return redirect()->route('home')->with('success', 'Movie deleted successfully!');
        }

        abort(404); // Movie not found
    }

*/
    public function destroy($id)
    {
        $movie = Movie::findOrFail($id);

        // Retrieve the deleted movie for display on the home page
        $deletedMovie = $movie->toArray();

        // Remove the movie from the database
        $movie->delete();

        // Check if there are deleted movies in the session
        $deletedMovies = session('deletedMovies', []);

        // Add the deleted movie to the list
        $deletedMovies[$id] = $deletedMovie;

        // Update the movies and deleted movies in the session
        session(['deletedMovies' => $deletedMovies]);

        // Redirect to home page with success message
        return redirect()->route('home')->with('success', 'Movie deleted successfully!');
    }




    /**
     * Helper method to get the array of movies.
     */
    /*
    private function getMovies()
    {
        return session('movies', []);
    }


    /**
     * Helper method to find a movie by its ID.
     */
    /*
    private function findMovieById($id)
    {
        $movies = $this->getMovies();

        foreach ($movies as $movie) {
            if ($movie['id'] == $id) {
                return $movie;
            }
        }

        abort(404); // Movie not found
    }

    /**
     * Helper method to find the key of a movie by its ID.
     */

    /*
    private function findMovieKeyById($movies, $id)
    {
        foreach ($movies as $key => $movie) {
            if ($movie['id'] == $id) {
                return $key;
            }
        }

        return false; // Movie not found
    }
    */


}
