@extends('layouts.app')

@section('title', 'Edit Form')

@section('content')
    <h1>Edit Form</h1>

    <form action="{{ route('form.update', ['id' => $movie->id]) }}" method="post">
        @csrf
        @method('PUT')

        <label for="title">Title:</label>
        <input type="text" name="title" id="title" value="{{ old('title', $movie->title) }}" required>
        <br>
        <label for="description">Description:</label>
        <input name="description" id="description" value="{{ old('description', $movie->description) }}"
               required></input>
        <!-- Add more form fields-->

        {{-- Hidden input for updating the movie --}}
        <input type="hidden" id="title" name="update_movie" value="1">

        <br>
        <button class="btn btn-warning" type="submit">Update</button>
    </form>
@endsection



