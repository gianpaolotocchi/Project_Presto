<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('homepage')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('indexAnnouncement')}}">Tutti gli Annunci</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="categoriesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Categorie
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="categoriesDropdown">
                        @foreach ($categories as $category)
                        <li><a class="dropdown-item" href="{{route('categoryShow', compact('category'))}}">{{$category->name}}</a></li>
                        <li><hr class="dropdown-divider"></li>
                        
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                @guest
                
                
                <li class="nav-item">
                    <a class="nav-link" href="{{route('register')}}">Registrati</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('login')}}">Accedi</a>
                </li>
                
                @endguest
                @auth
                @if (Auth::user()->is_revisor)
                
                <li class="nav-item">
                    <a class="nav-link  position-relative" aria-current="page" href="{{route('revisor.index')}}" >Zona revisore
                        <span class=" position-absolute top-0  traslate-middle  badge rounded-pill bg-danger">
                            {{\App\Models\Announcement::toBeRevisonedCount()}}
                            <span class="visually-hidden">unread messages</span>
                        </span>
                    </a>
                </li>
                @endif
                
                <li class="nav-item dropdown  ms-2">
                    <a class="nav-link dropdown-toggle ms-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{Auth::user()->name}}
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li class="dropdown-item" ></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="/logout" onclick="event.preventDefault(); document.getElementById('form-logout').submit();">Logout</a>
                            <form id="form-logout" action="{{route('logout')}}" method="post" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('announcement.create')}}">Crea Annuncio</a>
                </li>
                @endauth

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle ms-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Lingue
                    </a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-item" ><x-languages lang="en" /></li>
                        <li class="dropdown-item" ><x-languages lang="es" /></li>
                        
                        <li class="dropdown-item" ><x-languages lang="it" /></li>
                    </ul>
                </li>
                
                
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>