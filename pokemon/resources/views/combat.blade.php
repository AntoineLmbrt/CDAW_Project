@extends('layouts.app')

@section('title', 'Combat')

@section('style')
<link rel="stylesheet" href="css/battle.css">
@endsection


@section('content')
    <div class="card" style="margin-left: 3.35%;margin-right: 3.35%;margin-top:9%;">
        <div class="card-header">
            <h3 class="card-title text-center">Combat</h3>
        </div>
        <div class="card-body">
            <div class="rn-product-area rn-section-gapTop masonary-wrapper-activation">

                <div class="container">
                    <div class="row mb--50 align-items-center">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12" style="padding: 2%">
                            <h3 id="title" class="title mb--0 text-center" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">Veuillez choisir votre adversaire :</h3>
                        </div>
                    </div>

                    @if($users->count() == 0)
                        <div class="container">
                            <div class="row g-5">
                                <div class="col-lg-12" data-sal="slide-up" data-sal-delay="150" data-sal-duration="800">
                                    <div class="section-title mb--30 text-center">
                                        <h2 id="result" class="title">Vous êtes le seul inscrit sur notre site, invitez vos amis à nous rejoindre !</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="box-table table-responsive" id="userSelect">
                            <table class="table table-bordered border-danger upcoming-projects table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>
                                        <span>Pseudo</span>
                                    </th>
                                    <th>
                                        <span>Niveau</span>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $index=>$user)
                                    @if($index % 2 == 0)
                                        <tr class="color-light"
                                            onclick="selectOpponent({{$user->id}},'{{$user->name}}', {{ json_encode($user->energies) }}, '{{$user->level}}')">
                                            <td><span>{{$user->name}}</span></td>
                                            <td><span class="color-green">{{$user->level}}</span></td>
                                        </tr>
                                    @else
                                        <tr onclick="selectOpponent({{$user->id}},'{{$user->name}}', {{ json_encode($user->energies) }}, '{{$user->level}}')">
                                            <td><span>{{$user->name}}</span></td>
                                            <td><span class="color-green">{{$user->level}}</span></td>
                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif

                    <div class="login-area rn-section-gapTop"  id="modeSelect">
                        <div class="container">
                            <div class="row g-5 justify-content-center">
                                <div class="col-lg-4 col-md-6 col-sm-12" >
                                    <div class = "row">
                                        <div class="card text-white bg-info mb-3">
                                            <button class="text-white btn" onclick="selectMode('randomAuto')">
                                                <div class="card-header">MODE AUTO</div>
                                                <div class="card-body">
                                                    <p class="card-text">Jouez en mode automatique avec des pokémons aléatoires !</p>
                                                </div>
                                            </button>
                                        </div>
                                        <div class="card text-white bg-danger mb-3">
                                            <button class="text-white btn" onclick="selectMode('random')">
                                                <div class="card-header">MODE SEMI-AUTO</div>
                                                <div class="card-body">
                                                    <p class="card-text">Jouez en mode semi-automatique (tour par tour) avec des pokémons alétoires !</p>
                                                </div>
                                            </button>
                                        </div>
                                        <div class="card text-white bg-warning mb-3">
                                            <button class="text-white btn" onclick="selectMode('manual')">  
                                                <div class="card-header">MODE MANUEL</div>
                                                <div class="card-body">
                                                    <p class="card-text">Jouez en mode manuel (tour par tour) en choisissant vos pokémons !</p>
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="pokemonSelect" class="container-fluid">
                        <div class="row row-cols-5 mesonry-list" >
                            @foreach($pokemons as $pokemon)
                                <div onclick="choosePokemons('{{$pokemon->name}}')" class="col {{$pokemon->energy->name}}" style="margin-top: 2%">
                                    <div class="product-style-one no-overlay">
                                        <div class="card-thumbnail">
                                            <a ><img style="height: 150px; width: 150px;" src="{{$pokemon->image}}" alt="pokemon_image"/></a>
                                        </div>
                                        <div class="product-share-wrapper">
                                        </div>
                                        <a><span class="product-name h5">{{$pokemon->name}}</span></a>
                                        <span class="latest-bid h5">{{$pokemon->energy->name}}</span>
                                        <div class="bid-react-area">
                                            <div class="last-bid"> <span class="h5">Niveau : {{$pokemon->level}}</span></div>
                                            <div class="react-area">
                                                <span class="number h5">HP : {{$pokemon->hp}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="d-flex align-items-center" id="battleSelect">
                        <div class="container-fluid" style="height: 40rem; width: 120rem;">
                            <div class="row pokemon-container">
                                <div class="col-6 text-center">
                                    <div class="progress" style="width: 70%; height:2rem;margin-left: 15%;">
                                        <div style="font-size: 2em; font-weight: bold;" id="progressbar1"
                                            class="progress-bar bg-success"
                                            role="progressbar"
                                            aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%">75%
                                        </div>
                                    </div>
                                    <img id="image1" class="pokemon-image">
                                    <div class="moves">
                                        <h3>Choisissez votre action</h3>
                                        <form>
                                            <button  type="button"  class="btn btn-primary pokemon1Buttons">Attaque spéciale</button>
                                            <button type="button"  class="btn btn-primary pokemon1Buttons">Défense spéciale</button>
                                            <button type="button"  class="btn btn-primary pokemon1Buttons">Attaque</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-6 text-center">
                                    <div class="progress" style="">
                                        <div style="font-size: 2em; font-weight: bold;" id="progressbar2"
                                            class="progress-bar bg-success"
                                            role="progressbar"
                                            aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%">75%
                                        </div>
                                    </div>
                                    <img id="image2" class="pokemon-image"/>
                                    <div class="moves">
                                        <h3>Choisissez votre action</h3>
                                        <form>
                                            <button type="button"  class="btn btn-primary pokemon2Buttons">Attaque spéciale</button>
                                            <button type="button"  class="btn btn-primary pokemon2Buttons">défense spéciale</button>
                                            <button type="button"  class="btn btn-primary pokemon2Buttons">Attaque</button>
                                        </form>
                                    </div>
                                </div>
                                <div id="nextButton" class="col-6 text-center">
                                    <button type="button" onclick="makeMove()" class="btn btn-primary">
                                        JOUER !
                                    </button>
                                </div>
                                <div id="comment"></div>
                            </div>
                        </div>
                    </div>
                    <div id="gameFinished" class="container">
                        <div class="row g-5">
                            <div class="col-lg-12" data-sal="slide-up" data-sal-delay="150" data-sal-duration="800">
                                <div class="section-title mb--30 text-center">
                                    <a href="/"><button class="btn btn-primary">Retourner Vers la page d'accueil </button></a>
                                    <a href="/combat"><button class="btn btn-primary">Relancer un combat </button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  </div>
    
@endsection

@section('script')
    <script>
        var user = {
            id: {{auth()->user()->id}},
            name: '{{auth()->user()->name}}',
            energies: {!! json_encode(auth()->user()->energies, JSON_HEX_TAG) !!},
            level: '{{auth()->user()->level}}',
        }
        var pokemons = {!! json_encode($pokemons->toArray(), JSON_HEX_TAG) !!};
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="js/battle.js"></script>
@endsection