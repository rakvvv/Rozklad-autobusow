<!-- resources/views/home.blade.php -->

<!DOCTYPE html>
<html lang="en">
@include('shared.head', ['pageTitle' => 'Główna Strona'])
<body class="d-flex flex-column min-vh-100">
@include('shared.navbar')
<style>
        .carousel-item img {
            height: 400px; /* Set the desired height */
            object-fit: cover; /* Ensure images cover the area without distortion */
        }
</style>

<div class="container mt-5">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('img/carousel1.jpg') }}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/carousel2.jpg') }}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/carousel3.jpg') }}" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="mt-5">
        <h1 class="fw-bolder mb-1">Witamy na stronie głównej Rozkładu Autobusów!</h1>
        <p class="fs-5 mb-4">Witamy w naszej aplikacji do zarządzania rozkładem autobusów. Dzięki tej aplikacji możesz łatwo wyszukiwać, przeglądać i zarządzać rozkładami autobusów. Poniżej znajdziesz instrukcje, jak korzystać z naszej aplikacji.</p>
        
        <h2 class="fw-bolder mb-1">Jak korzystać z aplikacji?</h2>
        <p class="fs-5 mb-4">Aby skorzystać z aplikacji, przejdź do zakładki <strong>Wyszukaj Przejazdu</strong>, gdzie możesz wyszukać dostępne przejazdy autobusowe. Możesz filtrować wyniki według miasta wyjazdu, miasta przyjazdu, daty i godziny wyjazdu.</p>

        <h3 class="fw-bolder mb-1">Kroki wyszukiwania:</h3>
        <ul>
            <li class="fs-5 mb-3">Wybierz miasto wyjazdu z listy rozwijanej.</li>
            <li class="fs-5 mb-3">Wybierz miasto przyjazdu z listy rozwijanej.</li>
            <li class="fs-5 mb-3">Wybierz datę wyjazdu.</li>
            <li class="fs-5 mb-3">Wybierz godzinę wyjazdu.</li>
            <li class="fs-5 mb-3">Kliknij przycisk <strong>Wyszukaj</strong>, aby zobaczyć dostępne przejazdy.</li>
        </ul>

        <h2 class="fw-bolder mb-1">Funkcje dla administratora</h2>
        <p class="fs-5 mb-4">Administratorzy mają możliwość dodawania, edytowania i usuwania rozkładów autobusowych. Aby uzyskać dostęp do tych funkcji, należy zalogować się jako administrator.</p>

        <h3 class="fw-bolder mb-1">Kroki dodawania nowego rozkładu:</h3>
        <ul>
            <li class="fs-5 mb-3">Przejdź do zakładki <strong>Dodaj przejazd</strong>.</li>
            <li class="fs-5 mb-3">Wypełnij formularz dodawania nowego rozkładu, podając wszystkie wymagane informacje.</li>
            <li class="fs-5 mb-3">Kliknij przycisk <strong>Dodaj przejazd</strong>, aby zapisać nowy rozkład.</li>
        </ul>
    </div>
</div>
<div class="d-flex justify-content-center">
    <div class="col-lg-4 mx-auto">
        <div class="card mb-4 text-center bg-dark">
            <div class="card-header"><strong class="text-white text-decoration-none">Szukaj</strong></div>
            <div class="card-body">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Wprowadz szukaną frazę..." aria-label="Wprowadz szukaną frazę..." aria-describedby="button-search" />
                    <button class="btn btn-primary" id="button-search" type="button">Go!</button>
                </div>
            </div>
        </div>
    </div>
</div>
@include('shared.footer')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
