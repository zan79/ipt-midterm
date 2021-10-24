<nav class="navbar navbar-expand-lg bg-light navbar-light sticky-top bs bg-lightt">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ url('/dashboard') }}">Cheap Talk</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="d-flex fw-bold" id="navbarNavDropdown">
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/dashboard">🏠Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/users">👪Users</a>
                </li>

                <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        📚 Category
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        @foreach(App\Models\Category::all() as $category)
                        <li><a class="dropdown-item" href="/categories/{{$category->id}}">📘 {{$category->category}}</a></li>
                        @endforeach
                    </ul>
                </li>

                <li class="nav-item ms-5">
                    <a class="btn btn-danger" href="{{ url('/login') }}">Logout</a>
                </li>
            </ul>
        </div>

    </div>
</nav>