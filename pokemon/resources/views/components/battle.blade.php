<div class="d-flex align-items-center" id="battleSelect">
    <div class="container-fluid" style="height: 40rem; width: 120rem;">
        <div class="row pokemon-container">
            <div class="col-6 text-center">
                <div class="progress" style="width: 70%; height:2rem;margin-left: 15%;">
{{--                    <div class="progressContent">test</div>--}}
                    <div style="font-size: 2em; font-weight: bold;" id="pokemonProgressbar1"
                         class="progress-bar progress-bar-striped progress-bar-animated bg-success"
                         role="progressbar"
                         aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%">75%
                    </div>
                </div>
                <h4>{{ auth()->user()->name}}</h4>
                <img id="pokemonImage1" class="pokemon-image"
                     src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/4.png"
                     alt="Charmander"/>
                
                
                <div class="moves">
                    <h3>Choisissez votre action</h3>
                    <form>
                        <button  type="button"  class="btn btn-primary pokemon1Buttons">Attaque spéciale
                        </button>
                        <button type="button"  class="btn btn-primary pokemon1Buttons">
                            Défense spéciale
                        </button>
                        <button type="button"  class="btn btn-primary pokemon1Buttons">Attaque
                        </button>
                    </form>
                </div>
            </div>
            <div class="col-6 text-center">
                <div class="progress" style="">
{{--                    <div class="progressContent">test</div>--}}
                    <div style="font-size: 2em; font-weight: bold;" id="pokemonProgressbar2"
                         class="progress-bar progress-bar-striped progress-bar-animated bg-success"
                         role="progressbar"
                         aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%">75%
                    </div>
                </div>
                
                <img id="pokemonImage2" class="pokemon-image"
                     src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/7.png"
                     alt="Squirtle"/>
                
                {{--                <p>--}}
                {{--                    Type: Water<br/>--}}
                {{--                    Level: 5<br/>--}}
                {{--                    Health:--}}
                {{--                </p>--}}
                <div class="moves">
                    <h3>Choisissez votre action</h3>
                    <form>
                        <button type="button"  class="btn btn-primary pokemon2Buttons">Attaque spéciale
                        </button>
                        <button type="button"  class="btn btn-primary pokemon2Buttons">défense spéciale
                        </button>
                        <button type="button"  class="btn btn-primary pokemon2Buttons">Attaque

                        </button>
                    </form>
                </div>
            </div>
            <div id="nextButton" class="col-6 text-center">
                <button type="button" onclick="makeMove()" class="btn btn-primary">
                    Suivant
                </button>
            </div>
            <div id="comment"></div>
            <div  id="timer">
                30
            </div>
        </div>
    </div>
</div>