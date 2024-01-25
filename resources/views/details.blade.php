<!-- resources/views/movies/details.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="text-center mt-5">
    <h1 class="mt-5 text-info">Movie Details</h1>
    <br><br>
    @if($movie)

            <div class="card bg-dark mb-3">
                <img src="{{ asset('storage/' . $movie->poster) }}" class="card-img-top custom-thumbnail mx-auto mt-4" alt="{{ $movie->title }}">
                <div class="card-body">
                    <h5 class="card-title text-light">{{ $movie->title }}</h5>
                    <p class="card-text text-light">{{ $movie->description }}</p>
                </div>
            </div>
    @else
        <p>Movie not found.</p>
    @endif

    </div>

    <div class="container text-left mb-5">
        <button class="btn btn-dark" onclick="window.location.href='{{ route('home') }}'">Back</button>
    </div>

    <style>
        .custom-thumbnail {
            max-width: 20%;
        }
    </style>
@endsection

