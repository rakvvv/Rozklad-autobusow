<!DOCTYPE html>
<html lang="en">
@include('shared.head', ['pageTitle' => 'Edytuj Przejazd'])
<body class="d-flex flex-column min-vh-100">
@include('shared.navbar')

<div class="container mt-5 mb-5">
@include('shared.validation-error')
@include('shared.session-error')
    <h1>Edytuj Przejazd</h1>
    <form method="POST" action="{{ route('schedules.update', $schedule->id) }}" enctype="multipart/form-data" class="needs-validation" novalidate>
        @csrf
        @method('PUT')
        <div class="form-group mb-2">
            <label for="bus_number" class="form-label">Numer Autobusu</label>
            <input type="text" name="bus_number" id="bus_number" class="form-control @if ($errors->first('bus_number')) is-invalid @endif" value="{{ $schedule->bus_number }}" required maxlength="255">
            <div class="invalid-feedback">Numer autobusu jest wymagany i nie może przekraczać 255 znaków.</div>
        </div>
        <div class="form-group mb-2">
            <label for="distance" class="form-label">Dystans (km)</label>
            <input type="number" step="0.01" name="distance" id="distance" class="form-control @if ($errors->first('distance')) is-invalid @endif" value="{{ $schedule->route->distance }}" required min="0">
            <div class="invalid-feedback">Dystans jest wymagany i musi być liczbą nieujemną.</div>
        </div>
        <div class="form-group mb-2">
            <label for="departure_city" class="form-label">Miasto Wyjazdu</label>
            <input type="text" name="departure_city" id="departure_city" class="form-control @if ($errors->first('departure_city')) is-invalid @endif" value="{{ $schedule->departureCities->first()->name }}" required maxlength="255">
            <div class="invalid-feedback">Miasto wyjazdu jest wymagane i nie może przekraczać 255 znaków.</div>
            <input type="file" name="departure_city_img" class="form-control mt-2">
        </div>
        <div class="form-group mb-2">
            <label for="arrival_city" class="form-label">Miasto Przyjazdu</label>
            <input type="text" name="arrival_city" id="arrival_city" class="form-control @if ($errors->first('arrival_city')) is-invalid @endif" value="{{ $schedule->arrivalCities->first()->name }}" required maxlength="255">
            <div class="invalid-feedback">Miasto przyjazdu jest wymagane i nie może przekraczać 255 znaków.</div>
            <input type="file" name="arrival_city_img" class="form-control mt-2">
        </div>
        <div class="form-group mb-2">
            <label for="departure_time" class="form-label">Godzina Odjazdu</label>
            <input type="datetime-local" name="departure_time" id="departure_time" class="form-control @if ($errors->first('departure_time')) is-invalid @endif" value="{{ $schedule->departure_time }}" required>
            <div class="invalid-feedback">Godzina odjazdu jest wymagana.</div>
        </div>
        <div class="form-group mb-2">
            <label for="arrival_time" class="form-label">Godzina Przyjazdu</label>
            <input type="datetime-local" name="arrival_time" id="arrival_time" class="form-control @if ($errors->first('arrival_time')) is-invalid @endif" value="{{ $schedule->arrival_time }}" required>
            <div class="invalid-feedback">Godzina przyjazdu jest wymagana i musi być późniejsza niż godzina odjazdu.</div>
        </div>
        <div class="form-group mb-2">
            <label for="ticket_price" class="form-label">Cena</label>
            <input type="number" step="0.01" name="ticket_price" id="ticket_price" class="form-control @if ($errors->first('ticket_price')) is-invalid @endif" value="{{ $schedule->ticket_price }}" required min="0">
            <div class="invalid-feedback">Cena biletu jest wymagana i musi być liczbą nieujemną.</div>
        </div>
        <div class="form-group mb-2">
            <label for="stops" class="form-label">Przystanki (Przystanki muszą być oddzielone przecinkiem)</label>
            <input type="text" name="stops[]" id="stops" class="form-control @if ($errors->first('stops')) is-invalid @endif" value="{{ implode(', ', $schedule->route->stops->pluck('name')->toArray()) }}" required>
            <div class="invalid-feedback">Przystanki są wymagane.</div>
        </div>
        <button type="submit" class="btn btn-primary">Zaktualizuj Przejazd</button>
    </form>
</div>

@include('shared.footer')
</body>
</html>
