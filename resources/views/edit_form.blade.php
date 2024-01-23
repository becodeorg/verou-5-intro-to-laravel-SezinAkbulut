@extends('layouts.app')

@section('title', 'Edit Form')

@section('content')
    <h1>Edit Form</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('form.update', ['id' => $movie['id']]) }}" method="post">
        @csrf
        @method('PUT')

        <label for="title">Title:</label>
        <input type="text" name="title" id="title" value="{{ old('title', $movie['title']) }}" required>
        <br>
        <label for="description">Description:</label>
        <input name="description" id="description" value="{{ old('description', $movie['description']) }}" required></input>
        <!-- Add more form fields-->
        <br>
        <button type="submit">Update</button>
    </form>

    {{-- Add a hidden input to pass the updated movies to the home page --}}
    <form id="updated-movies-form" action="{{ route('home') }}" method="post">
        @csrf
        <input type="hidden" name="updatedMovies" value="{{ json_encode($movies) }}">
        <button type="submit" style="display: none;"></button>
    </form>
@endsection
{{-- Dump movies for debugging --}}
<div>
    <h2>Debugging Movies:</h2>
    @dump($movies);
    @dump(session('movies'));

</div>

