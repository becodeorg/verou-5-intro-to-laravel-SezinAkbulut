<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Movie; // Movie Model

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        //  $movies = Movie::all();
        ////return view('home', compact('movies'));
        $movies = [
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
            // Add more movie entries as needed
        ];
        return view('home', compact('movies'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create_form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation
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


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        // You might want to retrieve and display specific data based on $id
        return view('form');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $movie = $this->findMovieById($id);
        $movies = $this->getMovies();

        return view('edit_form', compact('movie', 'movies'));
    }


    /**
     * Update the specified resource in storage.
     */
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

            // Check if updated movies are submitted
            if ($request->has('updatedMovies')) {
                $updatedMovies = json_decode($request->input('updatedMovies'), true);

                // Update the movies in the session
                session(['movies' => $updatedMovies]);
            }
            // Save the updated movies array in the session
            session(['movies' => $movies]);

            // Debug statements
           // dump($movies);  // Check if the movies array is updated
           // dump(session('movies'));  // Check if the session variable is updated
           // die("Debugging stopped!");

            // Redirect to home page with success message
           // return redirect()->route('home')->with('success', 'Movie updated successfully!');
           return view('home', compact('movies'));
        }

        abort(404); // Movie not found
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $movies = $this->getMovies();
        $key = $this->findMovieKeyById($movies, $id);

        if ($key !== false) {
            unset($movies[$key]);

            session(['movies' => $movies]);
            return redirect()->route('home')->with('success', 'Movie deleted successfully!');
        }

        abort(404); // Movie not found
    }



    /**
     * Helper method to get the array of movies.
     */
    private function getMovies()
    {
        $movies = [
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
        ];

        return $movies;
    }


    /**
     * Helper method to find a movie by its ID.
     */
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
    private function findMovieKeyById($movies, $id)
    {
        foreach ($movies as $key => $movie) {
            if ($movie['id'] == $id) {
                return $key;
            }
        }

        return false; // Movie not found
    }
}
