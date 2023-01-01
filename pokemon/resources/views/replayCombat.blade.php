@extends('layouts.app2')




@section('content')
    <div class="rn-breadcrumb-inner ptb--30">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <h5 class="title text-center text-md-start">Combat</h5>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-list">
                        <li class="item"><a href="index.html">Home</a></li>
                        <li class="separator"><i class="feather-chevron-right"></i></li>
                        <li class="item current">Combats</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="rn-product-area rn-section-gapTop masonary-wrapper-activation">

        <div class="container">
            <div class="row mb--50 align-items-center">
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <h3 id="headline" class="title mb--0" data-sal-delay="150" data-sal="slide-up"
                        data-sal-duration="800"></h3>
                </div>
            </div>
            @include('components.startPlaying')
            @include('components.battle')
            @include('components.gameFinished')
        </div>
    </div>
@endsection

@section('script')
    <script>
        var user = {
            id: {{$user1->id}},
            name: '{{$user1->name}}',
            energies: {!! json_encode($user1->energies, JSON_HEX_TAG) !!},
            level: '{{$user1->level}}',
        }
        var user2 = {
            id: {{$user2->id}},
            name: '{{$user2->name}}',
            energies: {!! json_encode($user2->energies, JSON_HEX_TAG) !!},
            level: '{{$user2->level}}',
        }
        var player1Pokemons = {!! json_encode($pokemons1->toArray(), JSON_HEX_TAG) !!};
        var player2Pokemons = {!! json_encode($pokemons1->toArray(), JSON_HEX_TAG) !!};

    </script>
    <script src="assets/js/vendor/replayBattle.js"></script>
@endsection