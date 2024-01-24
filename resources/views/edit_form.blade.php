@extends('layouts.app')

@section('title', 'Edit Form')

@section('content')
    <h1>Edit Form</h1>

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
        <button class="btn btn-warning" type="submit">Update</button>
    </form>

    {{-- Add a hidden input to pass the updated movies to the home page --}}
    @if ($updatedMovies = session('updatedMovies'))
    <form id="updated-movies-form" action="{{ route('home') }}" method="post">
        @csrf
        @foreach ($updatedMovies as $updatedMovie)

        <input type="hidden" id="title" name="updatedMovies" value="{{ $updatedMovie['title'] }}">

        <input type="hidden" id="description" name="updatedMovies" value="{{ $updatedMovie['description'] }}">
        @endforeach


        @endif
    </form>

    {{-- Add a hidden input to pass the updated movies to the home page --}}
    @if ($updatedMovies = session('$updatedMovies'))
        <form id="updated-movies-form" action="{{ route('home') }}" method="post">
            @csrf
            @foreach ($updatedMovies as $updatedMovie)

                <input type="hidden" id="title" name="updatedMovies" value="{{ $updatedMovie['title'] }}">

                <input type="hidden" id="description" name="updatedMovies" value="{{ $updatedMovie['description'] }}">
            @endforeach


            @endif
        </form>
@endsection


@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

{{-- Dump movies for debugging --}}
<div>
    @dump($movies);
    @dump(session('movies'));

</div>

