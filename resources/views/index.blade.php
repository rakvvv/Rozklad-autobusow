<!DOCTYPE html>
<html lang="en">
@include('shared.head', ['pageTitle' => 'Rozklad autobusowy'])
<body class="d-flex flex-column min-vh-100">
@include('shared.navbar')
<style>
    .city-image {
        width: 45%;
        height: auto;
    }
    .city-images-container {
        display: flex;
        justify-content: space-between;
    }
</style>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 ">
            <div class="card bg-dark text-center">
                <div class="card-header"><strong class="text-white text-decoration-none">Wyszukaj przejazd</strong></div>
                <div class="card-body ">
                    <form method="GET" action="{{ route('search') }}">
                        <div class="form-group">
                            <label for="departure_city">Miasto wyjazdu</label>
                            <select name="departure_city" id="departure_city" class="form-control">
                                <option value="">Wybierz miasto</option>
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}" {{ $city->id == $departureCity ? 'selected' : '' }}>{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="arrival_city">Miasto przyjazdu</label>
                            <select name="arrival_city" id="arrival_city" class="form-control">
                                <option value="">Wybierz miasto</option>
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}"> {{ $city->id == $arrivalCity ? 'selected' : '' }}>{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="departure_date">Data wyjazdu</label>
                            <input type="date" name="departure_date" id="departure_date" class="form-control" value="{{ $departureDate }}">
                        </div>

                        <div class="form-group">
                            <label for="departure_time">Godzina wyjazdu</label>
                            <input type="time" name="departure_time" id="departure_time" class="form-control" value="{{ $departureTime }}">
                        </div>

                        <div class="form-group mt-4">
                            <button type="submit" class="btn btn-primary">Wyszukaj</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Search Results -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                @if ($schedules->isNotEmpty())
                    @foreach ($schedules as $schedule)
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="city-images-container">
                                        @if ($schedule->departureCities->isNotEmpty())
                                            <img class="city-image rounded" src="{{ asset('storage/' . $schedule->departureCities->first()->img) }}" alt="Image of {{ $schedule->departureCities->first()->name }}">
                                        @endif
                                        @if ($schedule->arrivalCities->isNotEmpty())
                                            <img class="city-image rounded" src="{{ asset('storage/' . $schedule->arrivalCities->first()->img) }}" alt="Image of {{ $schedule->arrivalCities->first()->name }}">
                                        @endif
                                    </div>
                                    <h5 class="card-title">{{ $schedule->bus_number }}</h5>
                                    <p class="card-text">
                                        <strong>Trasa:</strong>
                                        @php
                                            $departureCities = $schedule->departureCities->pluck('name')->toArray();
                                            $arrivalCities = $schedule->arrivalCities->pluck('name')->toArray();
                                        @endphp
                                        @if (!empty($departureCities) && !empty($arrivalCities))
                                            {{ implode(' &rarr; ', $departureCities) }} &rarr; {{ implode(' &rarr; ', $arrivalCities) }}
                                        @else
                                            Brak informacji o trasie
                                        @endif
                                    </p>
                                    <p class="card-text">
                                        <strong>Przystanki:</strong>
                                        @if ($schedule->route->stops->isNotEmpty())
                                            {{ implode(' , ', $schedule->route->stops->pluck('name')->toArray()) }}
                                        @else
                                            Brak przystanków
                                        @endif
                                    </p>
                                    <p class="card-text"><strong>Odległość:</strong> {{ $schedule->route->distance ?? 'Brak informacji' }} km</p>
                                    <p class="card-text"><strong>Odjazd:</strong> {{ $schedule->formatted_departure_time ?? 'Brak informacji' }}</p>
                                    <p class="card-text"><strong>Przyjazd:</strong> {{ $schedule->formatted_arrival_time ?? 'Brak informacji' }}</p>
                                    <p class="card-text"><strong>Cena biletu:</strong> {{ $schedule->ticket_price ?? 'Brak informacji' }} zł</p>
                                </div>
                                @can('update', $schedule)
                                    <div class="card-footer">
                                        <a href="{{ route('schedules.edit', $schedule->id) }}" class="btn btn-primary">Edit</a>
                                        <form action="{{ route('schedules.destroy', $schedule->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                @endcan
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-md-12">
                        <p>Brak dostępnych przejazdów.</p>
                    </div>
                @endif
            </div>
            <div class="d-flex justify-content-center mt-4">
                {{ $schedules->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </section>
</div>

@include('shared.footer')
</body>
</html>
