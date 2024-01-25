
@extends('layouts.app')

@section('title', 'Home')

@section('content')
    @if(session('success'))
        <div class="alert alert-success mt-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="container text-center">
        <h1 class="mt-4 font-weight-bold text-info display-4">Movie Collection</h1>

        <a href="{{ route('form.create') }}" class="btn btn-dark mt-3">Add New</a>


        <!-- Display movies -->
        @if ($movies->count() > 0)
            <div class="mt-4">
                @foreach ($movies as $movie)
                    <div class="movie">
                        <br>
                        <div class="card bg-dark mb-3">
                            <img src="{{ asset('storage/' . $movie->poster) }}" class="card-img-top custom-thumbnail mx-auto mt-4" alt="{{ $movie->title }}">
                            <div class="card-body">
                                <h5 class="card-title text-light">{{ $movie->title }}</h5>
                                <p class="card-text text-light">{{ $movie->description }}</p>
                                <a href="{{ route('details', ['id' => $movie->id]) }}" class="btn btn-primary">Details</a>


                         <a href="{{ route('form.edit', ['id' => $movie->id]) }}" class="btn btn-warning">Update</a>
                          <form action="{{ route('form.destroy', ['id' => $movie->id]) }}" method="post" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this movie?')">Delete</button>
                            <br>
                         </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p>No movies found.</p>
        @endif

        {{-- Dump movies for debugging
        <div class="mt-4">
            @dump($movies)
        </div>
        --}}

    </div>
    <style>
        .custom-thumbnail {
            max-width: 30%;
        }
    </style>
@endsection
