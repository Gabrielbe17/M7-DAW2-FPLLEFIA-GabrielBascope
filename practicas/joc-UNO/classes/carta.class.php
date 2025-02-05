<?php
    class Carta {
        public string $palo;
        public $num; //num o especial (string)
        public string $id;


        public function __construct(string $palo, $num, string $id){   
            $this->palo = $palo; //color de la carta
            $this->num = $num; //numero de la carta o especial
            $this->id = $id; //id carta
        }

        public function pinta_carta() {
            return "<img src='images/cartas_uno/{$this->num}_{$this->palo}.png' alt='carta'/>";
        }
        public function pinta_carta_link() {
            // mostrar la carta con un link para seleccionarla ()
            return "<a href='?num={$this->num}&color={$this->palo}&id={$this->id}'><img style='width: 4.55rem' src='images/cartas_uno/{$this->num}_{$this->palo}.png' alt='carta'/></a>";
        }
        public function pinta_carta_girada() {
            //mostrar carta girada (cuando esta oculta)
            return "<img style='width: 4.45rem' src='images/cartas_uno/carta_girada.png' alt='carta_girada'/>";
        }   

    }
?>