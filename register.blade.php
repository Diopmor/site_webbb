<x-app-layout>


    <title>Inscription</title>
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">


    @section('content')
        <main class="container">
            <form action="/register" method="post">
                @csrf
                <h1>Inscription</h1>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="form-group">
                    <label for="prenom">Prénom</label>
                    <input type="text" class="form-control" name="prenom" id="prenom" value="{{ old('prenom') }}"
                        required>
                </div>
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" class="form-control" name="nom" id="nom" value="{{ old('nom') }}"
                        required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}"
                        required>
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" class="form-control" name="password" id="password" required>
                </div>
                <div class="form-group">
                    <label for="date_naissance">Date de naissance</label>
                    <input type="date" class="form-control" name="date_naissance" id="date_naissance"
                        value="{{ old('date_naissance') }}" required>
                </div>


                <button type="submit" class="btn btn-primary">S'inscrire</button>
            </form>
        </main>

    </x-app-layout>
