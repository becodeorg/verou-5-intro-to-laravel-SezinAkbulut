@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <h1>Movie Collection</h1>

    <a href="{{ route('form.create') }}" class="btn btn-primary">Add New</a>

    @foreach ($movies as $movie)
        <div class="movie">
            <h2>{{ $movie['title'] }}</h2>
            <p>{{ $movie['description'] }}</p>
            <a href="{{ route('form.edit', ['id' => $movie['id']]) }}" class="btn btn-warning">Update</a>

            <form action="{{ route('form.destroy', ['id' => $movie['id']]) }}" method="post" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this movie?')">Delete</button>
            </form>
        </div>
    @endforeach

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Dump movies for debugging --}}
    <div>
        <h2>Debugging Movies:</h2>
        @dump($movies)
        @dump(session('movies'))
    </div>
@endsection


