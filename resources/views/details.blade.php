<!-- resources/views/movies/details.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="text-center mt-5">
    <h1 class="mt-5 text-info">Movie Details</h1>
    <br><br>
    @if($movie)
        <h3>{{ $movie->title }}</h3>
        <p>{{ $movie->description }}</p>
    @else
        <p>Movie not found.</p>
    @endif

    </div>
@endsection

