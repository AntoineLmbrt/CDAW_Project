
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
for ($i=1; $i<=10; ++$i) {
  $pokemon = new Pokemon($i);
  echo $i;
}
?>