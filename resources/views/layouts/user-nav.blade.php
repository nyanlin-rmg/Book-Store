<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand pacifico" href="#">Sample Book Store</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="/">Home</a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Author
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a href="/store" class="dropdown-item">All Author</a>
                    @foreach(\App\Book::all()->sortBy('author') as $book)
                        <a href="{{ route('selectAuthor', $book) }}" class="dropdown-item">{{ $book->author }}</a>
                    @endforeach
                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Category
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a href="/store" class="dropdown-item">All Category</a>
                    @foreach(\App\Category::all()->sortBy('name') as $category)
                        <a href="{{ route('selectCategory', $category) }}" class="dropdown-item">{{ $category->name }}</a>
                    @endforeach
                </div>
            </li>
            <li class="nav-item">
                <a href="/store/cart" class="nav-link">Cart</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>