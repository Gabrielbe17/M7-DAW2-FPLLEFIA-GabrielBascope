<?php
    class Baraja{
        public $conjunto_cartas = [];
        public $contador = 0;

        public function crea_baraja(){
            // generar todas las cartas de juego

            foreach (["red", "yellow", "blue", "green"] as $color) {
                // para cada color, crear baraja
                for($i = 1; $i <= 9; $i++){
                    // como generar id?
                    $id = $color . '-' . $i .  '-' .  $this->contador;
                    // ej -> red-1-0
                    $this->conjunto_cartas[] = new Carta($color, $i, $id);
                    $this->contador += 1;
                }

                // cartas especiales
                $id = $color . '-' . 'skip'.  '-' .  $this->contador;
                $this->conjunto_cartas[] = new Carta($color, 'skip', $id); // skip

                $this->contador += 1;
                $id = $color . '-' . 'picker'.  '-' .  $this->contador;
                $this->conjunto_cartas[] = new Carta($color, 'picker', $id); // +2

                $this->contador += 1;
                $id = $color . '-' . 'reverse'.  '-' .  $this->contador;
                $this->conjunto_cartas[] = new Carta($color, 'reverse', $id); // reversa

            }
        }

        public function mezcla(){
            shuffle($this->conjunto_cartas);
        }
        public function pinta_baraja(){
            // muestra todas las cartas, usando el metodo pinta carta de cada objeto carta en conjunto_cartas[]
            $output = '';
            foreach ($this->conjunto_cartas as $carta) {
                $output .= $carta->pinta_carta(); 
            }
            return $output;
        }
        public function pinta_baraja_girada(){
            // Muestra todas las cartas giradas usando el metodo pinta_carta_girada()
            $output = '';
            foreach ($this->conjunto_cartas as $carta) {
                $output .= $carta->pinta_carta_girada(); 
            }
            return $output;
        }
    }

?>