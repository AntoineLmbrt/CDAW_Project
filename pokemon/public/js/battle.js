$('#modeSelect').hide();
$('#gameFinished').hide();
$('#pokemonSelect').hide();
$('#nextButton').hide();

var filteredPokemons = pokemonSelect.getElementsByClassName('col');
var movesSelect = document.getElementsByClassName('moves');
var pokemon1Buttons = document.getElementsByClassName('pokemon1Buttons');
var pokemon2Buttons = document.getElementsByClassName('pokemon2Buttons');
var progressContent = document.getElementsByClassName('progress');

var mode;

var pokemons1 = []
var pokemons2 = []

var indexPokemon1 = 0;
var indexPokemon2 = 0;

var round = 1;
var move = 1;
var firstPlayer;
var comment = '';
var health1;
var currentHealth1;
var health2;
var currentHealth2;
var defense1 = 0;
var defense2 = 0;

var userPokemons = pokemons.filter(pokemon => pokemon.level <= user.level && user.energies.some(energy => pokemon.energy.name === energy.name))

var opponent;
var opponentPokemons = [];
function selectOpponent(id, userName, energies, level = 1) {
    opponent = {
        id: id,
        name: userName,
        energies: energies,
        level: level
    }


    opponentPokemons = pokemons.filter(pokemon => pokemon.level <= opponent.level && opponent.energies.some(energy => pokemon.energy.name === energy.name))
    $('#userSelect').hide();
    $('#modeSelect').show();
    $('#title').html("Veuillez choisir un mode de combat :");
}

function selectMode(id) {
    mode = id;
    $('#userSelect').hide();
    $('#modeSelect').hide();
    $('#title').hide();
    switch (mode) {
        case 'randomAuto':
            pokemons1 = userPokemons.slice(0, 3)
            pokemons2 = opponentPokemons.slice(0, 3)
    
            Array.from(movesSelect).forEach((moves) => {
                moves.style.display = 'none';
            });
            
            $('#nextButton').show();

            setupPokemonOnScreen(1, 0);
            setupPokemonOnScreen(2, 0);
            updateProgressBar(1, currentHealth1, health1);
            updateProgressBar(2, currentHealth2, health2);
    
            document.getElementById('battleSelect').setAttribute('style', 'display: flex !important')
    
            firstPlayer = Math.random() < 0.5 ? 1 : 2;
            break;
        case 'random' :
            $('#title').show();
            pokemons1 = userPokemons.slice(0, 3)
            pokemons2 = opponentPokemons.slice(0, 3)
    
            setupPokemonOnScreen(1, 0);
            setupPokemonOnScreen(2, 0);
            updateProgressBar(1, currentHealth1, health1);
            updateProgressBar(2, currentHealth2, health2);
    
            document.getElementById('battleSelect').setAttribute('style', 'display: flex !important')

            Array.from(progressContent).forEach((progress) => {
                progress.style.marginBottom = '15%';
            });    
            firstPlayer = Math.random() < 0.5 ? 1 : 2;

            setPokemon1MovestoButtons();
            setPokemon2MovestoButtons();
            titleUpdate(firstPlayer);

            break;
        case 'manual' :
            indexPokemon1 = 1;
            indexPokemon2 = 1;
            $('#title').show();
            $('#pokemonSelect').show();

            firstPlayer = Math.random() < 0.5 ? 1 : 2;

            if (firstPlayer === 1) {
                titleUpdate(1,indexPokemon1)
                displayPokemonList(userPokemons);
            } else {
                titleUpdate(2,indexPokemon2)
                displayPokemonList(opponentPokemons);
            }

            setPokemon1MovestoButtons();
            setPokemon2MovestoButtons();
            break;
    }
}

function makeMove() {

    if (indexPokemon1 < 3 && indexPokemon2 < 3) {
        if (round % 2 === 1) {
            if (firstPlayer === 1) {
                if (move % 3 === 1) {
                    applyMove(1, 'super_attack', pokemons1[indexPokemon1].special_attack)
                } else if (move % 3 === 2) {
                    applyMove(1, 'super_defense', pokemons1[indexPokemon1].special_defense)
                } else {
                    applyMove(1, 'attack', pokemons1[indexPokemon1].attack)
                }
            } else {
                //player2

                // first attack
                if (move % 3 === 1) {
                    applyMove(2, 'super_attack', pokemons2[indexPokemon1].special_attack)
                } else if (move % 3 === 2) {
                    applyMove(2, 'super_defense', pokemons2[indexPokemon1].special_defense)
                } else {
                    applyMove(2, 'attack', pokemons2[indexPokemon1].attack)
                }

            }
        } else {
            if (firstPlayer === 1) {
                //player2
                // first attack
                if (move % 3 === 1) {
                    applyMove(2, 'super_attack', pokemons2[indexPokemon1].special_attack)
                } else if (move % 3 === 2) {
                    applyMove(2, 'super_defense', pokemons2[indexPokemon1].special_defense)
                } else {
                    applyMove(2, 'attack', pokemons2[indexPokemon1].attack)
                }
            } else {
                //player1

                // first attack
                if (move % 3 === 1) {
                    applyMove(1, 'super_attack', pokemons1[indexPokemon1].special_attack)
                } else if (move % 3 === 2) {
                    applyMove(1, 'super_defense', pokemons1[indexPokemon1].special_defense)
                } else {
                    applyMove(1, 'attack', pokemons1[indexPokemon1].attack)
                }
            }
            move++;
        }
        round++;
    } else {
        $('#battleSelect').hide();
        $('#title').hide();
        $('#gameFinished').show();

        if (indexPokemon1 >= 3) {
            $('#result').html(`${opponent.name} a gagné le combat`);
        } else {
            $('#result').html(`${user.name} a gagné le combat`);
        }
    }
}

function setupPokemonOnScreen(player, index) {
    if (indexPokemon1 < 3 && indexPokemon2 < 3) {
        if (player === 1) {

            health1 = pokemons1[index].hp * pokemons1[index].level + 100;
            currentHealth1 = health1;
            document.getElementById('image1').src = pokemons1[index].image;
        } else {
            health2 = pokemons2[index].hp * pokemons2[index].level +100;
            currentHealth2 = health2;
            document.getElementById('image2').src = pokemons2[index].image;

        }
    } else {
        $('#battleSelect').hide();
        $('#title').hide();
        $('#gameFinished').show();

        if (indexPokemon1 >= 3) {
            $('#result').html(`${opponent.name} a gagné le combat`);
        } else {
            $('#result').html(`${user.name} a gagné le combat`);
        }
    }
}

function applyMove(player, move, value) {
    if (player === 1) {
        switch (move) {
            case 'super_attack':
                if (value < defense2) {
                    currentHealth2 -= 0;
                } else {
                    currentHealth2 -= value - defense2;
                }
                
                comment = ` ${user.name} attaque avec la super attaque de son pokémon, il inflige ${value} points de dégat. \n ${opponent.name} bloque ${defense2} points de dégat avec la super défense de son pokémon ! `
                $('#comment').html(comment);
                defense2 = 0;
                if (currentHealth2 < 0) {
                    indexPokemon2++;
                    setupPokemonOnScreen(2, indexPokemon2);
                    setPokemon1MovestoButtons();
                    setPokemon2MovestoButtons();
                }
                updateProgressBar(2, currentHealth2, health2);

                break;
            case 'super_defense':
                defense1 = value;
                comment = `${user.name} bloque ${defense1} points de dégat à l'aide de la défense spéciale de son pokémon !`  
                $('#comment').html(comment);
                break;
            case 'attack':
                if (value < defense2) {
                    currentHealth2 -= 0;
                } else {
                    currentHealth2 -= value - defense2;
                }
                comment = ` ${user.name} inflige ${value} points de dégat à l'aide de l'attaque de son pokémon. \n ${opponent.name} bloque ${defense2} points de l'attaque !`
                $('#comment').html(comment);
                defense2 = 0;
                if (currentHealth2 <= 0) {
                    indexPokemon2++;
                    setupPokemonOnScreen(2, indexPokemon2);
                    setPokemon1MovestoButtons();
                    setPokemon2MovestoButtons();
                }
                updateProgressBar(2, currentHealth2, health2);

        }
    } else {
        switch (move) {
            case 'super_attack':
                if (value < defense1) {
                    currentHealth1 -= 0;
                } else {
                    currentHealth1 -= value - defense1;
                }
                
                comment = ` ${opponent.name} attaque avec la super attaque de son pokémon, il inflige ${value} points de dégat. \n ${user.name} bloque ${defense1} points de dégat avec la super défense de son pokémon ! `
                $('#comment').html(comment);
                if (currentHealth1 < 0) {
                    indexPokemon1++;
                    setupPokemonOnScreen(1, indexPokemon1);
                    setPokemon1MovestoButtons();
                    setPokemon2MovestoButtons();
                }
                updateProgressBar(1, currentHealth1, health1);
                break;
            case 'super_defense':
                defense2 = value;
                comment = `${opponent.name} bloque ${defense2} points de dégat à l'aide de la défense spéciale de son pokémon !`
                $('#comment').html(comment);
                break;
            case 'attack':
                if (value < defense1) {
                    currentHealth1 -= 0;
                } else {
                    currentHealth1 -= value - defense1;
                }
                
                comment = ` ${opponent.name} inflige ${value} points de dégat à l'aide de l'attaque de son pokémon. \n ${user.name} bloque ${defense1} points de l'attaque !`
                $('#comment').html(comment);
                defense1 = 0;
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
            document.getElementById('progressbar1').style.width = (currentHealth / health * 100) + '%';
            $('#progressbar1').html(currentHealth + '/' + health);
        } else {
            document.getElementById('progressbar2').style.width = (currentHealth / health * 100) + '%';
            $('#progressbar2').html(currentHealth + '/' + health);
        }
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
            pokemons1.push(pokemon);
            indexPokemon1++;
            displayPokemonList(opponentPokemons);
            titleUpdate(2, indexPokemon2);
        } else {
            pokemons2.push(pokemon);
            indexPokemon2++;
            displayPokemonList(userPokemons);
            titleUpdate(1, indexPokemon1);
        }
    } else {
        if (firstPlayer === 1) {
            pokemons2.push(pokemon);
            indexPokemon2++;
            displayPokemonList(userPokemons);
            titleUpdate(1, indexPokemon1);

        } else {
            pokemons1.push(pokemon);
            indexPokemon1++;
            displayPokemonList(opponentPokemons);
            titleUpdate(2, indexPokemon2);
        }
    }
    round++;

    if (userPokemons.length < 3 || opponentPokemons.length < 3) {
        $('#title').html("il n'y a pas assez de pokémons correspondant à ce profil");
    }
    filterPokemonsSelected(pokemonName);

    if (pokemons1.length > 2 && pokemons2.length > 2) {
        indexPokemon1 = 0;
        indexPokemon2 = 0;
        move = 1;
        battleSelect.setAttribute('style', 'display: flex !important');
        Array.from(movesSelect).forEach((moves) => {
            moves.style.display = 'block';
        });
        $('#pokemonSelect').hide();
        setupPokemonOnScreen(1, 0);
        setupPokemonOnScreen(2, 0);
        updateProgressBar(1, currentHealth1, health1);
        updateProgressBar(2, currentHealth2, health2);
        Array.from(progressContent).forEach((progress) => {
            progress.style.marginBottom = '15%';
        });
        titleUpdate(firstPlayer);
    }


}

function titleUpdate(player, pokemonIndex) {
    if (pokemonIndex < 4) {
        if (player === 1) {
            $('#title').html(`${user.name} ! Veillez choisir votre pokemon numéro ${pokemonIndex}`);
        } else {
            $('#title').html(`${opponent.name} ! Veillez choisir votre pokémon numéro ${pokemonIndex}`);
        }
    }
}

function titleUpdate(player) {
    if (player === 1) {
        $('#title').html(`C'est au tour de ${user.name} !`);
    } else {
        $('#title').html(`C'est au tour de ${opponent.name} !`);
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
        makeMoveRoundByRound(1, 'super_attack', pokemons1[indexPokemon1].special_attack);
    };
    pokemon1Buttons[1].onclick = function () {
        makeMoveRoundByRound(1, 'super_defense', pokemons1[indexPokemon1].special_defense);
    };
    pokemon1Buttons[2].onclick = function () {
        makeMoveRoundByRound(1, 'attack', pokemons1[indexPokemon1].attack);
    };

}

function setPokemon2MovestoButtons() {

    pokemon2Buttons[0].onclick = function () {
        makeMoveRoundByRound(2, 'super_attack', pokemons2[indexPokemon2].special_attack);
    };
    pokemon2Buttons[1].onclick = function () {
        makeMoveRoundByRound(2, 'super_defense', pokemons2[indexPokemon2].special_defense);
    };
    pokemon2Buttons[2].onclick = function () {
        makeMoveRoundByRound(2, 'attack', pokemons2[indexPokemon2].attack);
    };
}

function makeMoveRoundByRound(player, move, value) {
    if (player === 1) {
        titleUpdate(2);
    } else {
        titleUpdate(1);
    }

    if (indexPokemon1 < 3 && indexPokemon2 < 3) {
        if (round % 2 === 1) {
            if (firstPlayer === player) {
                applyMove(player, move, value)
                round++;

            }
        } else {
            if (firstPlayer !== player) {
                applyMove(player, move, value)
                round++;
            }
        }
    } else {
        $('#battleSelect').hide();
        $('#title').hide();
        $('#gameFinished').show();
        if (indexPokemon1 >= 3) {
            $('#result').html(`${opponent.name} a gagné le combat`);
        } else {
            $('#result').html(`${user.name} a gagné le combat`);
        }
    }
}

function displayPokemonList(PokemonList) {
    if (PokemonList.length < 3) {
        Array.from(filteredPokemons).forEach(function (currentPokemon) {
            currentPokemon.style.display = 'none';
        });
        $('#title').html("il n'y a pas assez de pokémons correspondant ce profil");
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