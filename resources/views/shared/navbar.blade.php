<!-- 

<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Rozkład jazdy autobusów</a>
        </div>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            @if (Auth::check())
            @can('create', App\Models\Schedule::class)
                <td><a class="nav-link" href="{{ route('schedules.create') }}">Dodaj Przejazd</a></td>
            @else
                <td></td>
            @endcan
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}">{{ Auth::user()->name }},  wyloguj się... </a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Zaloguj się...</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Rejestracja</a>
                </li>
            @endif
        </ul>
    </div>
</nav> -->


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand"  >Rozkład jazdy autobusów</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('search') }}">Wyszukaj Przejazdu</a>
                    </li>
                </ul>
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        @if (Auth::check())
                        @can('create', App\Models\Schedule::class)
                            <td><a class="nav-link" href="{{ route('schedules.create') }}">Dodaj Przejazd</a></td>
                        @else
                            <td></td>
                        @endcan
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}">{{ Auth::user()->name }},  wyloguj się... </a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Zaloguj się...</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Rejestracja</a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>