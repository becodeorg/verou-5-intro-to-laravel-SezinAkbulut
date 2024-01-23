@extends('layouts.app')

@section('title', 'Edit Form')

@section('content')
    <h1>Edit Form</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('form.update', ['id' => $id]) }}" method="post">
        @csrf
        @method('PUT')

        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}" required>

        <!-- Add more form fields-->

        <button type="submit">Update</button>
    </form>
@endsection

