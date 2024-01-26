<!-- nav bar-->
<nav class="navbar navbar-dark bg-dark">

    <div class="hidden w-full md:block md:w-auto" id="navbar-solid-bg">
        <ul class="flex flex-col font-medium mt-4 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-transparent dark:bg-gray-800 md:dark:bg-transparent dark:border-gray-700">
            <li>
                <a href="{{ route('show.home') }}" class="block py-2 px-3 md:p-0 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:dark:text-blue-500 dark:bg-blue-600 md:dark:bg-transparent" aria-current="page">Home</a>
            </li>
            <li>
                <a href="{{ route("showUsers") }}" class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Users</a>
            </li>

            <li class="pl-24">
                <a href="{{ route("showRegister") }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Register</a>
            </li>
        </ul>
    </div>
    <form class="form-inline" action="{{ route('search') }}" method="GET">
        <input class="form-control mr-sm-2 text-center" type="search" name="query" placeholder="Find a movie" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
</nav>
