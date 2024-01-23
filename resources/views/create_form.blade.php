@extends('layouts.app')

@section('title', 'Create Form')

@section('content')
    <h1>Create Movie</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Form -->
    <form action="{{ route('form.create') }}" method="post">
        @csrf
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" required>

        <label for="description">Description:</label>
        <textarea name="description" id="description" required></textarea>

        <!-- Add more form fields for other movie properties -->

        <button type="submit">Create Movie</button>
    </form>
@endsection
