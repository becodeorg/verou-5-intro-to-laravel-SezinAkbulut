@extends('layouts.app')

@section('title', 'Edit Form')

@section('content')

    <div class="container mt-3">
        <h1 class="text-center text-warning mb-5">Update</h1>

        <form action="{{ route('form.update', ['id' => $movie->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row justify-content-center">
                <div class="col-md-6">
                    @if($movie->poster)
                        <div class="form-group text-center">
                            <label for="currentPoster"></label>
                            <img src="{{ asset('storage/' . $movie->poster) }}" class="card-img-top custom-thumbnail" alt="{{ $movie->title }}">
                        </div>
                    @endif
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="poster"><strong>Poster:</strong></label>
                        <input type="file" name="poster" class="form-control">
                    </div>

                    <label for="title"><strong>Title:</strong></label>
                    <input type="text" name="title" id="title" value="{{ old('title', $movie->title) }}" required class="form-control">

                    <label for="description"><strong>Description:</strong></label>
                    <input name="description" id="description" value="{{ old('description', $movie->description) }}" required class="form-control">

                    {{-- Hidden input for updating the movie --}}
                    <input type="hidden" name="update_movie" value="1">

                    <br>
                    <button class="btn btn-warning" type="submit">Update</button>
                </div>
            </div>
        </form>
    </div>

    <div class="container text-left fixed-bottom mb-5">
        <button class="btn btn-dark" onclick="window.location.href='{{ route('home') }}'">Back</button>
    </div>

    <style>
        .custom-thumbnail {
            max-width: 40%;
        }
    </style>

@endsection
