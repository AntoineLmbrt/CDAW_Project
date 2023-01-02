@extends('layouts.app')

@section('title', 'Combat')
@section('style')
    <style>
        #battleSelect{
        background-image: url('/assets/images/pokemon/102327.png');
        background-size: 100%;
        background-position: center;
    }
    .pokemon-container {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .pokemon-image {
        width: 150px;
        height: 150px;
    }
    .progress{
        border-radius: 10px;
        background-color: #ab4f4f;
        width: 70%;
        height:2rem;
        margin-left: 15%;
        margin-bottom: 25%
    }
    #battleSelect{
        height: 60rem;
        display: none !important;
    }
    tr{
        cursor: pointer;
    }

    #timer{
        color: #000000;
        position: relative;
        left: 98%;
        bottom: 30px;
        font-size: 4em;
    }
    .progressContent{
        position: relative;
        left: 100px;
        font-size: 2em;
        font-weight: bold;
    }
    #comment {
        top: 40px;
        position: relative;
        background-color: bisque;
        width: 60%;
        left: 20px;
        height: 100px;
        padding: 10px;
        font: 1.4em/1.6em cursive;
        color: #095484;
    }
    </style>
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
                            <h3 id="headline" class="title mb--0 text-center" data-sal-delay="150" data-sal="slide-up"
                                data-sal-duration="800">Choisissez votre adversaire !</h3>
                        </div>
                    </div>
                    @include('components.chooseUser')
                    @include('components.battle')
                    @include('components.chooseMode')
                    @include('components.choosePokemon')
                    @include('components.gameFinished')
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
        console.log(user);
        var pokemons = {!! json_encode($pokemons->toArray(), JSON_HEX_TAG) !!};
        // Un joueur ne peut jouer que les pokemons qui ont un niveau inférieur ou égal au sien
        
        var pokemons1 = pokemons.filter(pokemon => pokemon.level <= user.level && user.energies.some(energy => pokemon.energy.name === energy.name))

    </script>
    <script src="js/CombatLogique.js"></script>
@endsection