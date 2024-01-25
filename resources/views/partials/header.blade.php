<!-- views/partials/header.blade.php -->
<nav class="navbar navbar-dark bg-dark">

    <a class="navbar-brand text-white font-weight-bold text-success ml-4" href="{{ route('home') }}">Home</a>


    <form class="form-inline" action="{{ route('search') }}" method="GET">
        <input class="form-control mr-sm-2 text-center" type="search" name="query" placeholder="Find a movie" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    <ul>
    <li class="nav-item mr-4">
        <a class="nav-link text-success" href="{{ route('register') }}">Register</a>
    </li>
    </ul>
</nav>
