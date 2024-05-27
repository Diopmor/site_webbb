<x-app-layout>

    <div class="container">

        <header class="row">
            <h3>{{ $categorie->nomCategorie }}</h3>
        </header>

        <!-- Grille de produits -->
        <div class="container my-4">
            <div class="row">
                @foreach ($produits as $index => $article)
                    <a href="/produits/{{ $article->id }}" class="col-md-3 mb-4 {{ $index < 4 ? 'top-photos' : '' }}>">
                        <div class="card h-100 ">
                            <!-- Placer le titre et le prix au-dessus de l'image -->
                            <div class="overlay pub_item w-100 text-center pt-2">
                                <h5 class="card-title mb-2">{{ $article->nomProduit }}</h5>
                                <p class="card-text">{{ $article->prix }} €</p>
                            </div>
                            <!-- Image carrée avec une taille fixe -->
                            <img src="{{ asset('img_app/' . $article->imageProduit) }}"
                                class="card-img-top square-image" alt="...">
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    <x-slot name="js">
        <script>
            function allerVersDetails(articleId) {
                window.location.href = 'detail_produits/' + articleId;
            }

            function allerVersListe() {
                window.location.href = 'detail_produits';
            }
        </script>
    </x-slot>

</x-app-layout>
