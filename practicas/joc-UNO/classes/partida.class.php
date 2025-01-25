<?php
   class Partida{
    public int $numero_jugadores;
    public int $numero_cartas;
    public int $turno; 
    public $baraja;
    public $carta_en_mesa; //instancia de carta  
    public $array_jugadores = [];
    public string $constante_sentido;

    public function __construct() {
        $this->constante_sentido = "horario";
        $this->turno = 1;
    }

    public function jugar(){
        
    }
    public function normas_uno(){

    }
    public function cambiar_turno(){
        $this->constante_sentido == 'horario' ? $this->turno += 1 : $this->turno -= 1;
    }
    public function cambiar_sentido(){
        $this->constante_sentido == 'horario' ? $this->constante_sentido = 'antihorario' : $this->constante_sentido = 'horario';
    }
}
?>