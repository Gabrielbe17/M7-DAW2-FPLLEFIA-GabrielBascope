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
        // Controla el flux principal del joc. Ha de:
        // ○ Mostrar l’estat actual del joc (cartes de cada jugador, carta sobre la taula).
        // ○ Permetre que el jugador actual tiri una carta o robi si no pot jugar.
        // ○ Verificar si un jugador ha guanyat.


        
    }
    public function normas_uno(){
        // Aplica les regles del joc per a les cartes especials:
        // ○ reverse: Canvia el sentit del joc actual.
        // ○ skip: Salta el torn del següent jugador.
        // ○ +2: Obliga el següent jugador a robar dues cartes.
    }
    public function cambiar_turno(){
        if ($this->turno  > $this->numero_jugadores - 1) {
            $this->turno = 1;
        }else{
            $this->constante_sentido == 'horario' ? $this->turno += 1 : $this->turno -= 1;
        }
    }
    public function cambiar_sentido(){
        $this->constante_sentido == 'horario' ? $this->constante_sentido = 'antihorario' : $this->constante_sentido = 'horario';
    }
}
?>