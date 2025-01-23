<?php
    class Jugador{
        public $mano; //cartas en la mano del jugador, instancia de Baraja
        public int $id;
        

        public function __construct(int $id){
            $this->id = $id;
            $this->mano = new Baraja();
        }
        public function afegir_carta($carta) {
            $this->mano->conjunto_cartas[] = $carta;
        }
        
        public function eliminar_carta($carta){
            //itera en mano (instancia de baraja), y elimina el objeto $carta pasado por parametro
            
        }
        public function mostrar_ma(){
            //  Mostra totes les cartes del jugador utilitzant pinta_carta().
            

        }
    }
?>