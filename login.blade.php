<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>

    <main class="container row justify-content-center w-100 mx-auto">
        <form action="{{ route('login.submit') }}" method="post" class="col-lg-6 mx-auto mt-5">
            @csrf
            @if ($errors->has('error'))
                <div class="alert alert-danger">
                    {{ $errors->first('error') }}
                </div>
            @endif
            {{-- Bootstrap --}}
            <div class="form-group">
                <label for="email">Adresse e-mail</label>
                <input type="email" class="form-control" placeholder="Email" name="email" id="email" value="{{ old('email') }}" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" class="form-control" placeholder="Password" name="password" id="password" required>
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="remember">
                <label class="form-check-label" for="remember">Se souvenir de moi</label>
            </div>
            <a href="/" class="btn btn-outline-danger">S'inscrire</a>
            <button type="submit" class="btn btn-primary">Connexion</button>
        </form>
    </main>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>

</html>
