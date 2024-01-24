@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="container text-center">
        <h1 class="mt-4">Movie Collection</h1>
        <a href="{{ route('form.create') }}" class="btn btn-primary mt-3">Add New</a>

        <!-- Display updated movies -->
        @if ($updatedMovies = session('updatedMovies'))
            <div class="mt-4">
                @foreach ($updatedMovies as $updatedMovie)
                    <div class="movie">
                        <h2>{{ $updatedMovie['title'] }}</h2>
                        <p>{{ $updatedMovie['description'] }}</p>
                        <a href="{{ route('form.edit', ['id' => $updatedMovie['id']]) }}" class="btn btn-warning">Update</a>
                        <form action="{{ route('form.destroy', ['id' => $updatedMovie['id']]) }}" method="post" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this movie?')">Delete</button>
                        </form>
                    </div>
                @endforeach
            </div>
        @endif

        <!-- Display added movies -->
        @if ($addedMovies = session('movies'))
            <div class="mt-4">
                @foreach ($addedMovies as $addedMovie)
                    <div class="movie">
                        <h2>{{ $addedMovie['title'] }}</h2>
                        <p>{{ $addedMovie['description'] }}</p>
                        <a href="{{ route('form.edit', ['id' => $addedMovie['id']]) }}" class="btn btn-warning">Update</a>
                        <form action="{{ route('form.destroy', ['id' => $addedMovie['id']]) }}" method="post" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this movie?')">Delete</button>
                        </form>
                    </div>
                @endforeach
            </div>
        @endif

        <h2 class="mt-4 text-info"><em>Deleted Movies:</em></h2>
        <!-- Display deleted movies -->
        @if ($deletedMovies = session('deletedMovies'))
            <div class="mt-4 process">
                @foreach ($deletedMovies as $deletedMovie)
                    <div class="movie progress-bar bg-info">
                        <h2>{{ $deletedMovie['title'] }}</h2>
                        <p>{{ $deletedMovie['description'] }}</p>
                    </div>
                @endforeach
            </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success mt-4">
                {{ session('success') }}
            </div>
        @endif

        {{-- Dump movies for debugging --}}
        <div class="mt-4">
            <h2>Debugging Movies:</h2>
            @dump($movies)
            @dump(session('movies'))
            @dump($addedMovies)
            @dump($updatedMovies)
            @dump($deletedMovies)
        </div>
    </div>
@endsection

