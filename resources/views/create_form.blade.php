@extends('layouts.app')

@section('title', 'Create Movie')

@section('content')
    <title>{{env("APP_NAME") . "Movie Collection"}}</title>
    <h1>Create Movie</h1>

    <!-- Form -->
    <form action="{{ route('form.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" name="title" id="title" required>
         </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" name="description" id="description" required></textarea>
        </div>

        <div class="form-group">
             <label for="poster">Poster:</label>
             <input type="file" name="poster" class="form-control">
        </div>


        <button type="submit" class="btn btn-primary">Create Movie</button>

    </form>

    <div class="container text-left fixed-bottom mb-5">
        <button class="btn btn-dark" onclick="window.location.href='{{ route('show.home') }}'">Back</button>
    </div>
@endsection
