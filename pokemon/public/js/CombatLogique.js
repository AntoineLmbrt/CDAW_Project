// User selection interface
var userSelect = document.getElementById('userSelect');

// Mode Selection interface
var modeSelect = document.getElementById('modeSelect');
modeSelect.style.display = 'none';

// battle selection interface
var battleSelect = document.getElementById('battleSelect');

// Game Finished interface
var gameFinished = document.getElementById('gameFinished');
gameFinished.style.display = 'none';

// Pokémon Select Interface
var pokemonSelect = document.querySelector('#pokemonSelect');
var filteredPokemons = pokemonSelect.getElementsByClassName('col');

pokemonSelect.style.display = 'none';

// Array(2)
var movesSelect = document.getElementsByClassName('moves');
var nextButton = document.getElementById('nextButton');
nextButton.style.display = 'none';

//comment Box
var CommentBox = document.getElementById('comment');

var headline = document.getElementById('headline');
var headlineResult = document.getElementById('headlineResult');


var pokemon1Buttons = document.getElementsByClassName('pokemon1Buttons');
var pokemon2Buttons = document.getElementsByClassName('pokemon2Buttons');

var pokemons2 = [];

var player1Pokemons = []
var player2Pokemons = []


var indexPokemon1 = 0;
var indexPokemon2 = 0;

var round = 1;
var tour = 1;
var firstPlayer;
var comment = '';
var i = 0;
var user2;
var health1;
var currentHealth1;
var health2;
var currentHealth2;
var mode ;

var defenseBlock1 = 0;
var defenseBlock2 = 0;

var progressbar1 = document.getElementById('pokemonProgressbar1');
var progressbar2 = document.getElementById('pokemonProgressbar2');
var progressContent = document.getElementsByClassName('progress');

var image1 = document.getElementById('pokemonImage1');
var image2 = document.getElementById('pokemonImage2');

function chooseUser(userId, userName, energies, level = 1) {
    user2 = {
        id: userId,
        name: userName,
        energies: energies,
        level: level
    }


    pokemons2 = pokemons.filter(pokemon => pokemon.level <= user2.level && user2.energies.some(energy => pokemon.energy.name === energy.name))
    userSelect.style.display = 'none';
    modeSelect.style.display = 'block';
    headline.innerText = "Choix du mode de combat";
}

function chooseMode(idMode) {
    mode = idMode;
    userSelect.style.display = 'none';
    modeSelect.style.display = 'none';
    headline.style.display = 'none';
    gameFinished.style.display = 'none';


    if (idMode === 1) {
        player1Pokemons = pokemons1.slice(0, 3)
        player2Pokemons = pokemons2.slice(0, 3)

        Array.from(movesSelect).forEach((moves) => {
            moves.style.display = 'none';
        });
        nextButton.style.display = 'block'

        setupPokemonOnScreen(1, 0);
        setupPokemonOnScreen(2, 0);
        updateProgressBar(1, currentHealth1, health1);
        updateProgressBar(2, currentHealth2, health2);

        battleSelect.setAttribute('style', 'display: flex !important');

        const randomNumber = Math.random();

        // If the random number is less than 0.5, player 1 goes first, otherwise player 2 goes first
        firstPlayer = randomNumber < 0.5 ? 1 : 2;

    } else if (idMode === 2) {
        indexPokemon1 = 1;
        indexPokemon2 = 1;
        headline.style.display = 'block'
        pokemonSelect.style.display = 'block';
        const randomNumber = Math.random();

        // If the random number is less than 0.5, player 1 goes first, otherwise player 2 goes first
        firstPlayer = randomNumber < 0.5 ? 1 : 2;
        if (firstPlayer === 1) {
            changeheadline(1,indexPokemon1)
            displayPokemonList(pokemons1);
        } else {
            changeheadline(2,indexPokemon2)
            displayPokemonList(pokemons2);
        }
        setPokemon1MovestoButtons();
        setPokemon2MovestoButtons();
    } else {
        headline.style.display = 'block'
        player1Pokemons = pokemons1.slice(0, 3)
        player2Pokemons = pokemons2.slice(0, 3)


        setupPokemonOnScreen(1, 0);
        setupPokemonOnScreen(2, 0);
        updateProgressBar(1, currentHealth1, health1);
        updateProgressBar(2, currentHealth2, health2);

        battleSelect.setAttribute('style', 'display: flex !important');
        Array.from(progressContent).forEach((progress) => {
            progress.style.marginBottom = '15%';
        });
        const randomNumber = Math.random();

        // If the random number is less than 0.5, player 1 goes first, otherwise player 2 goes first
        firstPlayer = randomNumber < 0.5 ? 1 : 2;
        setPokemon1MovestoButtons();
        setPokemon2MovestoButtons();
        changeheadlineOnCombat(firstPlayer);
        if (firstPlayer === 1) {
            startTimer(2)
        } else {
            startTimer(1)
        }
    }


}


function makeMove() {

    if (indexPokemon1 < 3 && indexPokemon2 < 3) {
        if (round % 2 === 1) {
            if (firstPlayer === 1) {
                //player1

                // first attack
                if (tour % 3 === 1) {
                    applyMove(1, 1, player1Pokemons[indexPokemon1].special_attack)
                } else if (tour % 3 === 2) {
                    applyMove(1, 2, player1Pokemons[indexPokemon1].special_defense)
                } else {
                    applyMove(1, 3, player1Pokemons[indexPokemon1].attack)
                }
            } else {
                //player2

                // first attack
                if (tour % 3 === 1) {
                    applyMove(2, 1, player2Pokemons[indexPokemon1].special_attack)
                } else if (tour % 3 === 2) {
                    applyMove(2, 2, player2Pokemons[indexPokemon1].special_defense)
                } else {
                    applyMove(2, 3, player2Pokemons[indexPokemon1].attack)
                }

            }
        } else {
            if (firstPlayer === 1) {
                //player2
                // first attack
                if (tour % 3 === 1) {
                    applyMove(2, 1, player2Pokemons[indexPokemon1].special_attack)
                } else if (tour % 3 === 2) {
                    applyMove(2, 2, player2Pokemons[indexPokemon1].special_defense)
                } else {
                    applyMove(2, 3, player2Pokemons[indexPokemon1].attack)
                }
            } else {
                //player1

                // first attack
                if (tour % 3 === 1) {
                    applyMove(1, 1, player1Pokemons[indexPokemon1].special_attack)
                } else if (tour % 3 === 2) {
                    applyMove(1, 2, player1Pokemons[indexPokemon1].special_defense)
                } else {
                    applyMove(1, 3, player1Pokemons[indexPokemon1].attack)
                }
            }
            tour++;
        }
        round++;
    } else {
        battleSelect.style.display = 'none';
        headline.style.display = 'none';
        gameFinished.style.display = 'block';

        if (indexPokemon1 >= 3) {
            headlineResult.innerText = `${user2.name} a gagné le combat`;
            saveCombat(user2.id)
        } else {
            headlineResult.innerText = `${user.name} a gagné le combat`;
            saveCombat(user.id)
        }
    }
}

function setupPokemonOnScreen(player, index) {
    if (indexPokemon1 < 3 && indexPokemon2 < 3) {
        if (player === 1) {

            health1 = player1Pokemons[index].hp * player1Pokemons[index].level + 100;
            currentHealth1 = health1;
            image1.src = player1Pokemons[index].image;
        } else {
            health2 = player2Pokemons[index].hp * player2Pokemons[index].level +100;
            currentHealth2 = health2;
            image2.src = player2Pokemons[index].image;

        }
    } else {
        battleSelect.style.display = 'none';
        headline.style.display = 'none';
        gameFinished.style.display = 'block';
        if (indexPokemon1 >= 3) {
            headlineResult.innerText = `${user2.name} a gagné le combat`;
            saveCombat(user2.id)
        } else {
            headlineResult.innerText = `${user.name} a gagné le combat`;
            saveCombat(user.id)
        }
    }
}

function applyMove(player, moveNumber, movePoints) {
    if (player === 1) {
        switch (moveNumber) {
            case 1:
                if (movePoints < defenseBlock2) {
                    currentHealth2 -= 0;
                } else {
                    currentHealth2 -= movePoints - defenseBlock2;
                }
                
                comment = ` ${user.name} attaque avec ${movePoints} Points. ${user2.name} bloque ${defenseBlock2} Points de l'attaque `
                 
                CommentBox.innerHTML = '';
                i = 0;
                typing();
                defenseBlock2 = 0;
                if (currentHealth2 < 0) {
                    indexPokemon2++;
                    setupPokemonOnScreen(2, indexPokemon2);
                    setPokemon1MovestoButtons();
                    setPokemon2MovestoButtons();
                }
                updateProgressBar(2, currentHealth2, health2);

                break;
            case 2:
                defenseBlock1 = movePoints;
                comment = `${user.name} choisit la defense spéciale et bloque ${defenseBlock1} points`
                 
                CommentBox.innerHTML = '';
                i = 0;
                typing();
                break;
            default:
                if (movePoints < defenseBlock2) {
                    currentHealth2 -= 0;
                } else {
                    currentHealth2 -= movePoints - defenseBlock2;
                }
                comment = ` ${user.name} attaque avec ${movePoints} points. ${user2.name} bloque ${defenseBlock2} points de l'attaque `
                CommentBox.innerHTML = '';
                i = 0;
                typing();
                defenseBlock2 = 0;
                if (currentHealth2 <= 0) {
                    indexPokemon2++;
                    setupPokemonOnScreen(2, indexPokemon2);
                    setPokemon1MovestoButtons();
                    setPokemon2MovestoButtons();
                }
                updateProgressBar(2, currentHealth2, health2);

        }
    } else {
        switch (moveNumber) {
            case 1:
                if (movePoints < defenseBlock1) {
                    currentHealth1 -= 0;
                } else {
                    currentHealth1 -= movePoints - defenseBlock1;
                }
                
                comment = ` ${user2.name} attaque avec ${movePoints} points. ${user.name} bloque ${defenseBlock1} points de l'attaque `
                CommentBox.innerHTML = '';

                i = 0;
                typing();
                defenseBlock1 = 0;

                if (currentHealth1 < 0) {
                    indexPokemon1++;
                    setupPokemonOnScreen(1, indexPokemon1);
                    setPokemon1MovestoButtons();
                    setPokemon2MovestoButtons();
                }
                updateProgressBar(1, currentHealth1, health1);
                break;
            case 2:
                defenseBlock2 = movePoints;
                comment = `${user2.name} choisis la défence speciale et va bloqué l'attaque suivant avec ${defenseBlock2} Points`
                CommentBox.innerHTML = '';
                i = 0;
                typing();
                break;
            default:
                if (movePoints < defenseBlock1) {
                    currentHealth1 -= 0;
                } else {
                    currentHealth1 -= movePoints - defenseBlock1;
                }
                
                comment = ` ${user2.name} attaque avec ${movePoints} points. ${user.name} bloque ${defenseBlock1} points de l'attaque `
                CommentBox.innerHTML = '';
                i = 0;
                typing();
                defenseBlock1 = 0;
                if (currentHealth1 <= 0) {
                    indexPokemon1++;
                    setupPokemonOnScreen(1, indexPokemon1);
                    setPokemon1MovestoButtons();
                    setPokemon2MovestoButtons();
                }
                updateProgressBar(1, currentHealth1, health1);
        }
    }
}

function updateProgressBar(player, currentHealth, health) {
    if (currentHealth > 0) {
        if (player === 1) {
            progressbar1.style.width = (currentHealth / health * 100) + '%';
            progressbar1.innerHTML = currentHealth + '/' + health;
        } else {
            progressbar2.style.width = (currentHealth / health * 100) + '%';
            progressbar2.innerHTML = currentHealth + '/' + health;
        }
    }

}

function typing() {
    if (i < comment.length) {
        CommentBox.innerHTML += comment.charAt(i);
        i++;
        setTimeout(typing, 50);
    }
}


function choosePokemons(pokemonName) {

    let pokemon = pokemons.find((pokemon) => {
        return pokemon.name === pokemonName;
    });
    pokemons = pokemons.filter((pokemon) => {
        return pokemon.name !== pokemonName;
    });
    if (round % 2 === 1) {
        if (firstPlayer === 1) {
            //joueur

            player1Pokemons.push(pokemon);
            indexPokemon1++;
            displayPokemonList(pokemons2);
            changeheadline(2, indexPokemon2);
        } else {
            //joueur2

            player2Pokemons.push(pokemon);

            indexPokemon2++;
            displayPokemonList(pokemons1);
            changeheadline(1, indexPokemon1);
        }
    } else {
        if (firstPlayer === 1) {
            //joueur2

            player2Pokemons.push(pokemon);

            indexPokemon2++;
            displayPokemonList(pokemons1);
            changeheadline(1, indexPokemon1);

        } else {
            //joueur1

            player1Pokemons.push(pokemon);

            indexPokemon1++;
            displayPokemonList(pokemons2);
            changeheadline(2, indexPokemon2);
        }
    }
    round++;

    if (pokemons1.length < 3 || pokemons2.length < 3) {
        headline.innerText = "il n'y a pas assez de pokémons correspondant à ce profil";
    }
    filterPokemonsSelected(pokemonName);

    if (player1Pokemons.length > 2 && player2Pokemons.length > 2) {
        indexPokemon1 = 0;
        indexPokemon2 = 0;
        tour = 1;
        battleSelect.setAttribute('style', 'display: flex !important');
        Array.from(movesSelect).forEach((moves) => {
            moves.style.display = 'block';
        });
        pokemonSelect.style.display = 'none';
        setupPokemonOnScreen(1, 0);
        setupPokemonOnScreen(2, 0);
        updateProgressBar(1, currentHealth1, health1);
        updateProgressBar(2, currentHealth2, health2);
        Array.from(progressContent).forEach((progress) => {
            progress.style.marginBottom = '15%';
        });
        changeheadlineOnCombat(firstPlayer);
        if (firstPlayer === 1) {
            startTimer(2)
        } else {
            startTimer(1)
        }
    }


}

function changeheadline(playerNumber, pokemonIndex) {
    if (pokemonIndex < 4) {
        if (playerNumber === 1) {
            headline.innerText = `${user.name} ! Veillez choisir ${pokemonIndex} Pokemon`;
        } else {
            headline.innerText = `${user2.name} ! Veillez choisir ${pokemonIndex} Pokemon`;
        }
    }
}

function changeheadlineOnCombat(playerNumber) {
    if (playerNumber === 1) {
        headline.innerText = `${user.name} ! Veillez choisir votre attaque/defense`;
    } else {
        headline.innerText = `${user2.name} ! Veillez choisir votre attaque/defense`;
    }
}

function filterPokemonsSelected(pokemonName) {
    Array.from(filteredPokemons).forEach(function (filteredPokemon) {
        var text = filteredPokemon.getElementsByClassName('product-name');
        var title = text[0].textContent;
        if (title.toLowerCase() === pokemonName) {
            filteredPokemon.parentNode.removeChild(filteredPokemon);
        }
    })
}

function setPokemon1MovestoButtons() {
    pokemon1Buttons[0].onclick = function () {
        makeMoveRoundByRound(1, 1, player1Pokemons[indexPokemon1].special_attack);
    };
    pokemon1Buttons[1].onclick = function () {
        makeMoveRoundByRound(1, 2, player1Pokemons[indexPokemon1].special_defense);
    };
    pokemon1Buttons[2].onclick = function () {
        makeMoveRoundByRound(1, 3, player1Pokemons[indexPokemon1].attack);
    };

}

function setPokemon2MovestoButtons() {

    pokemon2Buttons[0].onclick = function () {
        makeMoveRoundByRound(2, 1, player2Pokemons[indexPokemon2].special_attack);
    };
    pokemon2Buttons[1].onclick = function () {
        makeMoveRoundByRound(2, 2, player2Pokemons[indexPokemon2].special_defense);
    };
    pokemon2Buttons[2].onclick = function () {
        makeMoveRoundByRound(2, 3, player2Pokemons[indexPokemon2].attack);
    };
}

function makeMoveRoundByRound(playerNumber, moveNumber, attackPoints) {
    if (playerNumber === 1) {
        changeheadlineOnCombat(2);
    } else {
        changeheadlineOnCombat(1);
    }

    if (indexPokemon1 < 3 && indexPokemon2 < 3) {
        if (round % 2 === 1) {
            if (firstPlayer === playerNumber) {
                clearInterval(timer);
                startTimer(playerNumber);
                applyMove(playerNumber, moveNumber, attackPoints)
                round++;

            }
        } else {
            if (firstPlayer !== playerNumber) {
                clearInterval(timer);
                startTimer(playerNumber);
                applyMove(playerNumber, moveNumber, attackPoints)
                round++;

            }
        }
    } else {
        battleSelect.style.display = 'none';
        headline.style.display = 'none';
        gameFinished.style.display = 'block';
        if (indexPokemon1 >= 3) {
            headlineResult.innerText = `${user2.name} a gagné le combat`;
            saveCombat(user2.id)
        } else {
            headlineResult.innerText = `${user.name} a gagné le combat`;
            saveCombat(user.id)
        }
    }
}


function onCounterEnd(playerNumber) {
    if (indexPokemon1 > 2 || indexPokemon2 > 2) {
        clearInterval(timer);
    } else {
        round++;
        if (playerNumber === 1) {
            changeheadlineOnCombat(1);
            clearInterval(timer);
            startTimer(2);
        } else {
            changeheadlineOnCombat(2);
            clearInterval(timer);
            startTimer(1);
        }
        // if (round % 2 === 1) {
        //     alert(` Player ${firstPlayer} Lost`)
        // } else {
        //     alert(` Player ${firstPlayer} Won`)
        // }
    }

}

var timer;

function startTimer(playerNumber) {
    var seconds = 31;

    timer = setInterval(function () {

        seconds--;


        document.getElementById("timer").innerHTML = seconds;


        if (seconds <= 0) {
            clearInterval(timer);
            onCounterEnd(playerNumber)
        }
    }, 1000);
}


function displayPokemonList(PokemonList) {
    if (PokemonList.length < 3) {
        Array.from(filteredPokemons).forEach(function (currentPokemon) {
            currentPokemon.style.display = 'none';
        });
        headline.innerText = "il n'y a pas assez de pokémons correspondant ce profil";
    } else {
        Array.from(filteredPokemons).forEach(function (currentPokemon) {
            var text = currentPokemon.getElementsByClassName('product-name');
            var title = text[0].textContent;
            if (PokemonList.some(Pokemon => Pokemon.name === title)) {
                currentPokemon.style.display = 'block';

            } else {
                currentPokemon.style.display = 'none';

            }
        });

    }


}


function saveCombat(winnerId) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        /* the route pointing to the post function */
        url: '/combat',
        type: 'POST',
        /* send the csrf-token and the input to the controller */
        data: {user1: user.id , user2: user2.id , winner :winnerId, mode:mode , pokemons1 : player1Pokemons , pokemons2: player2Pokemons},
        /* remind that 'data' is the response of the AjaxController */
        success: function (data) {
            console.log(1);
        }
    });
}