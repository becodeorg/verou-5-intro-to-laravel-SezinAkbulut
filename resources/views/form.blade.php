


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
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required>

        <!-- Add more form fields -->

        <button type="submit">Submit</button>
    </form>
@endsection
