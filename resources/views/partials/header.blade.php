<!-- views/partials/header.blade.php -->
<nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand text-white font-weight-bold text-success" href="{{ route('home') }}">Home</a>

    <a class="nav-link" href="{{ route('register') }}">Register</a>

    <form class="form-inline" action="{{ route('search') }}" method="GET">
        <input class="form-control mr-sm-2 text-center" type="search" name="query" placeholder="Find a movie" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
</nav>
