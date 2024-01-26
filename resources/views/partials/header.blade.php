<!-- nav bar -->
<nav class="navbar navbar-dark bg-dark">
    <div class="d-flex flex-row align-items-center justify-content-between w-full">
        <ul class="flex-row font-medium d-flex list-unstyled ml-5">
            <li class="mr-4">
                <a href="{{ route('show.home') }}" class="text-white">Home</a>
            </li>
            <li class="mr-4">
                <a href="{{ route("showUsers") }}" class="text-white">Users</a>
            </li>
            <li>
                <a href="{{ route("showRegister") }}" class="text-white">Register</a>
            </li>
        </ul>
    </div>
    <form class="form-inline mr-5" action="{{ route('search') }}" method="GET">
        <input class="form-control mr-sm-2 text-center" type="search" name="query" placeholder="Find a movie" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
</nav>
