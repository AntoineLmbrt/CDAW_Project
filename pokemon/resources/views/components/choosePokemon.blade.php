<div id="pokemonSelect" class="container-fluid">
    <div class="row row-cols-5 mesonry-list" >
        @foreach($pokemons as $pokemon)

            <!-- start single product -->
            <div onclick="choosePokemons('{{$pokemon->name}}')" class="col {{$pokemon->energy->name}}" style="margin-top: 2%">
                <div class="product-style-one no-overlay">
                    <div class="card-thumbnail">
                        <a ><img style="height: 150px; width: 150px;" src="{{$pokemon->image}}" alt="pokemon_image"/></a>
                    </div>
                    <div class="product-share-wrapper">

                    </div>
                    <a ><span class="product-name h5">{{$pokemon->name}}</span></a>
                    <span class="latest-bid h5">{{$pokemon->energy->name}}</span>
                    <div class="bid-react-area">
                        <div class="last-bid"> <span class="h5">Niveau : {{$pokemon->level}}</span></div>
                        <div class="react-area">
                            <span class="number h5">Les points de Vie: {{$pokemon->hp}}</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end single product -->
        @endforeach
    </div>
</div>