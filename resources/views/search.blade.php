<!-- resources/views/search.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container text-center mt-6">
        <h2 class="text-info text-center">Search Results for "{{ $query }}"</h2>
        <br>

        @if($movies->isEmpty())
            <p class="text-center">No results found.</p>
        @else
            <ul class="list-unstyled text-center">
                @foreach($movies as $movie)
                    <li class="mb-4">
                        <h2>{{ $movie->title }}</h2>
                        <p>{{ $movie->description }}</p>
                        <a href="{{ route('details', ['id' => $movie->id]) }}" class="btn btn-info">Details</a>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>


@endsection
<br><br>
<div class="container text-left fixed-bottom mb-5">
    <button class="btn btn-dark" onclick="window.location.href='{{ route('home') }}'">Back</button>
</div>
