<x-app-layout>
    <div class="container">
        <div class="article-details">
            @isset($article)
                <div class="sidebar">
                    <h1>
                        {{ $article['nomProduit'] }}
                        <p>Prix: {{ $article['prix'] }}</p>
                    </h1>

                    <h3>Description: {{ $article['descriptionProduit'] }}</h3><br>
                    @auth
                        <div id="myDropdown" class="dropdown-content">
                            <form method="post" action="{{ route('achajouterAuPanierat', $article->id) }}">
                                @csrf
                                <button onclick="ajouterAuPanier()"></a><img src="img_app/panier.jpg" />Ajouter</button>
                            </form>
                        </div>
                    @endauth
                    @guest
                        <a id="co" href="/login">Se Connecter pour Ajouter</a>
                    @endguest
                </div>
            @else
                <p>Produit non trouvé.</p>
            @endisset
        </div>


        <div class="container">
            <img src="{{ asset('../img_app/' . $article['imageProduit']) }}" alt="{{ $article['nomProduit'] }}">
            <div class="pdp-product-images clearfix" id="media_inner_12221377">
                <div class="swiper-pagination-thumbs">
                    <div class="swiper-container swiper-container-vertical swiper-container-free-mode">
                        <div class="swiper-wrapper" style="transform: translate3d(0px, 0px, 0px);">


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>



    <style>
        .container {
            display: flex;
            justify-content: space-between;
        }

        .sidebar {
            width: 55%;
            /* Ajustez la largeur de la colonne de droite selon vos besoins */
        }

        .article-details {
            width: 40%;
            /* Ajustez la largeur de la colonne de gauche selon vos besoins */
        }

        img {
            max-width: 100%;
            /* Assurez-vous que l'image ne dépasse pas la largeur de son conteneur */
            height: auto;
            margin-right: 20px;
            /* Ajoutez un espace à droite de l'image */
        }

        h1 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        h3 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        #co {
            text-decoration: none;
            color: blue;
        }

        button {
            background-color: #4CAF50;
            /* Green */
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }
    </style>


















    <script>
        function ajouterAuPanier(idProduit) {
            $.ajax({
                url: `/produits/${idProduit}/ajouter-au-panier`,
                type: 'POST',
                data: {
                    idProduit: idProduit
                },
                success: function(response) {
                    alert(response);
                },
                error: function() {
                    alert('Erreur lors de l\'ajout au panier.');
                }
            });
        }
    </script>
</x-app-layout>
