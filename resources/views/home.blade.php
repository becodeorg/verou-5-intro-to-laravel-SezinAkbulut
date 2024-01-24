@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="container text-center">
        <h1 class="mt-4 font-bold">Movie Collection</h1>
        <a href="{{ route('form.create') }}" class="btn btn-primary mt-3">Add New</a>

        <!-- Display added movies -->
        <!-- Display added movies -->
        @if ($movies->count() > 0)
            <div class="mt-4">
                @foreach ($movies as $movie)
                    <div class="movie">
                        <br>
                        <h2>{{ $movie->title }}</h2>
                        <p>{{ $movie->description }}</p>
                        <br>
                        <a href="{{ route('details', ['id' => $movie->id]) }}" class="btn btn-info">Details</a>
                        <a href="{{ route('form.edit', ['id' => $movie->id]) }}" class="btn btn-warning">Update</a>
                        <form action="{{ route('form.destroy', ['id' => $movie->id]) }}" method="post" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this movie?')">Delete</button>
                            <br>
                        </form>

                    </div>
                @endforeach
            </div>
        @else
            <p>No movies found.</p>
        @endif

    @if(session('success'))
            <div class="alert alert-success mt-4">
                {{ session('success') }}
            </div>
        @endif

        {{-- Dump movies for debugging --}}
        <div class="mt-4">
            @dump($movies)
        </div>
    </div>
@endsection
