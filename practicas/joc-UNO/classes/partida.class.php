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

    public function jugar($color, $num, $id){
        // Controla el flux principal del joc. Ha de:
        // ○ Mostrar l’estat actual del joc (cartes de cada jugador, carta sobre la taula).
        // ○ Permetre que el jugador actual tiri una carta o robi si no pot jugar.
        // ○ Verificar si un jugador ha guanyat.

        // bloque para controlar la carta seleccionada, eliminar, poner en mesa, cambiar turno...
        if ($color == $this->carta_en_mesa->palo || $num == $this->carta_en_mesa->num) {
                    
            // eliminar carta de baraja de jugador y ponerla al principio de la baraja en mesa
            // incrementar turno
            $jugador = $this->array_jugadores[$this->turno - 1];
            $cartaSeleccionada = $jugador->eliminar_carta($id);
            
            // comprobar si el jugador ha ganado
            if (count($jugador->mano->conjunto_cartas) == 0) {
                return "El Jugador {$this->turno} ha ganado!";
            }

            $this->normas_uno($num);

            if ($cartaSeleccionada != null) {
                $this->carta_en_mesa = $cartaSeleccionada;
                $this->cambiar_turno();
                return true;
            }
        }else{
            return false;
        }    
        
    }
    public function robar_carta(){
        // anyadir carta al jugador del turno actual y pasar al siguiente jugador
        $jugador = $this->array_jugadores[$this->turno - 1];

        // controlar el caso en que conjunto cartas este vacio
        if (count($this->baraja->conjunto_cartas) == 1) {
            $this->baraja->crea_baraja();
            $this->baraja->mezcla();
        }

        $carta = array_shift($this->baraja->conjunto_cartas);

        // añadir carta al jugador y seguir con otro jugador
        $jugador->afegir_carta($carta);
        $this->cambiar_turno();
    }
    public function normas_uno($num_carta){
        // Aplica les regles del joc per a les cartes especials:
        // ○ reverse: Canvia el sentit del joc actual.
        // ○ skip: Salta el torn del següent jugador.
        // ○ +2: Obliga el següent jugador a robar dues cartes.

        switch ($num_carta) {
            case 'skip':
                $this->cambiar_turno();
                break;
            case 'reverse':
                $this->cambiar_sentido();
                break;
            case 'picker':
                // si sentido horario, anyadir 2 cartas a jugador = turno + 1
                $indiceJugador = $this->constante_sentido == "horario" ? $this->turno : $this->turno - 2; 
                $jugadorAfectado = $this->array_jugadores[$indiceJugador];

                // como picker elimina dos cartas de conjunto cartas, comprobar que el array no quede vacio
                for ($i=0; $i < 2; $i++) { 
                    if (count($this->baraja->conjunto_cartas) <= 2) {
                        $this->baraja->crea_baraja();
                        $this->baraja->mezcla();
                    }

                    $carta = array_pop($this->baraja->conjunto_cartas);

                    if ($jugadorAfectado != null) {
                        // si el jugador existe, añadir carta
                        $jugadorAfectado->afegir_carta($carta);             
                    }           
                }
                break;
            default:
                break;
        }
    }
    public function cambiar_turno(){
        if ($this->constante_sentido === "horario") {
            $this->turno += 1;
            if ($this->turno > $this->numero_jugadores) {
                $this->turno = 1;
            }
        }else{
            $this->turno -= 1;
            if ($this->turno < 1) {
                $this->turno = $this->numero_jugadores;
            }
        }
    }
    public function cambiar_sentido(){
        $this->constante_sentido == 'horario' ? $this->constante_sentido = 'antihorario' : $this->constante_sentido = 'horario';
    }
}
?>