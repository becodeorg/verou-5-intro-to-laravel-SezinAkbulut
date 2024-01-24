


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
    <form action="{{ route('form.create') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" name="title" id="title" required>
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" name="description" id="description" required></textarea>
        </div>

        <!-- Add more form fields -->

        <button type="submit">Submit</button>
    </form>
@endsection
