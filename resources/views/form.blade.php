@extends('layouts.app')

@section('title', 'Form')

@section('content')
    <h1>Submit Form</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Form -->
    <form action="{{ route('form.create') }}" method="post" enctype="multipart/form-data">
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

        <button type="submit">Submit</button>
    </form>
@endsection
