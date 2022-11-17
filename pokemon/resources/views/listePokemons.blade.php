@extends('template')

@section('content')
    <?php
        class Pokemon {

            public $name;
            public $energy;
            public $img;

            public function __construct($id) {
                $this->name = json_decode(file_get_contents('https://pokeapi.co/api/v2/pokemon-form/'.$id))->{'name'};
                $this->energy = json_decode(file_get_contents('https://pokeapi.co/api/v2/pokemon-form/'.$id))->{'types'}[0]->{'type'}->{'name'};
                $this->img = json_decode(file_get_contents('https://pokeapi.co/api/v2/pokemon-form/'.$id))->{'sprites'}->{'front_default'};
            }
        }

        echo '<table><tr>';
        echo '<th>id</th>';
        echo '<th>name</th>';
        echo '<th>image</th></tr>';
        for ($i=1; $i<=$number; ++$i) {
            $pokemon = new Pokemon($i);
            echo '<tr><th>'.$i.'</th>';
            echo '<th>'.$pokemon->name.'</th>';
            echo '<th>'.$pokemon->energy.'</th>';
            echo '<th><img src="'.$pokemon->img.'"></th></tr>';
        }
        echo '</table>';
    ?>
@endsection