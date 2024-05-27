<x-app-layout>


    <!-- Boutons d'actions -->
    <!-- Carousel -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            @foreach ($carouselItems as $i => $j)
                <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i; ?>"
                    class="@if ($i == 0) active @endif"></li>
            @endforeach
        </ol>
        <div class="carousel-inner">
            @foreach ($carouselItems as $i => $article)
                <div class="carousel-item @if ($i == 0) active @endif">
                    <img src="{{ asset('img_app/' . $article->imageProduit) }}" class="w-100 object-fit-cover"
                        alt="...">
                </div>
            @endforeach
        </div>

        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Précédent</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Suivant</span>
        </a>
    </div>
    <!-- Deux photos publicitaires au-dessus du Carousel -->
    <div class="container my-4">
        <div class="row pub">
            @foreach ($pubs as $p)
                <div class="col-12 col-md-6 mb-4 text-center">
                    <img src="{{ asset('img_app/' . $p->imageProduit) }}"
                        class="img-fluid h-100 w-100 object-fit-cover advertisement" alt="Publicité 1">
                </div>
            @endforeach
        </div>
    </div>

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
                        <img src="{{ asset('img_app/' . $article->imageProduit) }}" class="card-img-top square-image"
                            alt="...">
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</x-app-layout>
