<!-- resources/views/search.blade.php -->
@extends('layouts.app')

@section('title')
    Find a movie
    @endsection

@section('content')


    <div class="container text-center mt-6">
        <h2 class="text-info text-center">Search Results for "{{ $query }}"</h2>
        <br>

        @if($movies->isEmpty())
            <p class="text-center">No results found.</p>
        @else
            <ul class="list-unstyled text-center">
                @foreach($movies as $movie)

                    <div class="card bg-dark mb-3">
                        <img src="{{ asset('storage/' . $movie->poster) }}" class="card-img-top custom-thumbnail mx-auto mt-4" alt="{{ $movie->title }}">
                        <div class="card-body">
                            <h5 class="card-title text-light">{{ $movie->title }}</h5>
                            <a href="{{ route('details', ['id' => $movie->id]) }}" class="btn btn-info">Details</a>
                        </div>
                    </div>
                @endforeach
            </ul>
        @endif
    </div>

    <br><br>
    <div class="container text-left  mb-5">
        <button class="btn btn-dark" onclick="window.location.href='{{ route('show.home') }}'">Back</button>
    </div>

    <style>
        .custom-thumbnail {
            max-width: 20%;
        }
    </style>
@endsection

