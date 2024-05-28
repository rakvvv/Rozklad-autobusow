<!DOCTYPE html>
<html lang="en">
@include('shared.head', ['pageTitle' => 'Rozklad autobusowy'])
<body class="d-flex flex-column min-vh-100">
@include('shared.navbar')
    <div class="container mt-5 mb-5">
        @include('shared.session-error')
        <div class="row mt-4 mb-4 text-center">
            <h1>Zarejestruj się</h1>
        </div>
        @include('shared.validation-error')
        <div class="row d-flex justify-content-center">
            <div class="col-10 col-sm-10 col-md-6 col-lg-4">
                <form method="POST" action="{{ route('register') }}" class="needs-validation" novalidate>
                    @csrf
                    <div class="form-group mb-2">
                        <label for="name" class="form-label">Nazwa użytkownika</label>
                        <input id="name" name="name" type="text" class="form-control @if ($errors->first('name')) is-invalid @endif" value="{{ old('name') }}" required>
                        <div class="invalid-feedback">Nazwa użytkownika jest wymagana!</div>
                    </div>
                    <div class="form-group mb-2">
                        <label for="email" class="form-label">Email</label>
                        <input id="email" name="email" type="email" class="form-control @if ($errors->first('email')) is-invalid @endif" value="{{ old('email') }}" required>
                        <div class="invalid-feedback">Nieprawidłowy email!</div>
                    </div>
                    <div class="form-group mb-2">
                        <label for="password" class="form-label">Hasło</label>
                        <input id="password" name="password" type="password" class="form-control @if ($errors->first('password')) is-invalid @endif" required>
                        <div class="invalid-feedback">Hasło jest wymagane!</div>
                    </div>
                    <div class="form-group mb-2">
                        <label for="password_confirmation" class="form-label">Potwierdź hasło</label>
                        <input id="password_confirmation" name="password_confirmation" type="password" class="form-control @if ($errors->first('password_confirmation')) is-invalid @endif" required>
                        <div class="invalid-feedback">Potwierdzenie hasła jest wymagane!</div>
                    </div>
                    <div class="text-center mt-4 mb-4">
                        <input class="btn btn-primary" type="submit" value="Zarejestruj się">
                    </div>
                </form>
            </div>
        </div>
    </div>

    @include('shared.footer')
</body>

</html>