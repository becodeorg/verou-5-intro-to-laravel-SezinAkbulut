@extends('layouts.app')

@section('title', 'Edit Form')

@section('content')
    <div class="container text-center mt-5">
    <h1 class="text-warning">Edit Form</h1>
    <br>
    <form action="{{ route('form.update', ['id' => $movie->id]) }}" method="post">
        @csrf
        @method('PUT')

        <label for="title"><strong>Title:</strong></label>
        <input type="text" name="title" id="title" value="{{ old('title', $movie->title) }}" required>
        <br>
        <label for="description"><strong>Description:</strong></label>
        <input name="description" id="description" value="{{ old('description', $movie->description) }}"
               required>
        <br>


        {{-- Hidden input for updating the movie --}}
        <input type="hidden" id="title" name="update_movie" value="1">

        <br>
        <button class="btn btn-warning" type="submit">Update</button>
    </form>

    </div>
@endsection

<div class="container text-left fixed-bottom mb-5">
    <button class="btn btn-dark" onclick="window.location.href='{{ route('home') }}'">Back</button>
</div>

