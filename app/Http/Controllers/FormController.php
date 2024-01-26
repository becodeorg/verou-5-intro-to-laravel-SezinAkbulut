<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Movie;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $movies = Movie::all();
        return view('show.home', compact('movies'));
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
    //Database method
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'poster' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $movie = new Movie;
        $movie->title = $validatedData['title'];
        $movie->description = $validatedData['description'];

        // Store the poster in the storage disk (public)
        $posterPath = Storage::disk('public')->put('posters', $request->file('poster'));
       // $posterPath = $request->file('poster')->store('posters');

        // Update the poster path in the database
        $movie->poster = $posterPath;

        // Save other fields
        $movie->save();

        return redirect()->route('show.home')->with('success', 'Movie created successfully!');
    }

    /**
     * Display the specified resource.
     */
    //Database method
    public function show(string $id)
    {
        $movie = Movie::find($id);
        dd($movie);
        return view("form{$id}");
    }

    /**
     * Show the form for editing the specified resource.
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

    //Database method
    public function update(Request $request, $id)
    {
        // Validation
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'poster' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Update movie based on $id
        $movie = Movie::findOrFail($id);

        // Update fields
        $movie->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
        ]);

        // Handle poster update
        if ($request->hasFile('poster')) {
            // Delete old poster
            Storage::disk('public')->delete($movie->poster);

            // Store the new poster in the storage disk (e.g., public)
            $posterPath = Storage::disk('public')->put('posters', $request->file('poster'));

            // Update the poster path in the database
            $movie->poster = $posterPath;
            $movie->save();
        }

        return redirect()->route('show.home')->with('success', 'Movie updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
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
        return redirect()->route('show.home')->with('success', 'Movie deleted successfully!');
    }

    /**
     * Helper method to get the array of movies.
     */
    public function search(Request $request)
    {
        $query = $request->input('query');
        $movies = Movie::where('title', 'like', "%$query%")->get();

        return view('search', ['movies' => $movies, 'query' => $query]);
    }

    public function showDetails($id)
    {
        $movie = Movie::find($id);

        return view('details', ['movie' => $movie]);
    }

}
