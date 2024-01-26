@extends("layouts.app")

@section('title', 'Register')

@section("content")
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <main class="container d-flex align-items-center justify-content-center">
        <form class="max-w-sm" action="{{ route("handleRegister") }}" method="POST">
            @csrf

            <h1 class="mt-5 mb-5 display-4 text-center text-primary">Register</h1>
            <div class="form-group">
                <label for="name">Name</label>
                <input name="name" type="text" id="name" class="form-control" placeholder="John Doe">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input name="password" type="password" id="password" class="form-control">
            </div>
            <div class="form-group">
                <label for="repeat_password">Repeat password</label>
                <input name="repeat_password" type="password" id="repeat_password" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary mt-3 mb-5">Register new account</button>
        </form>
    </main>
@endsection
