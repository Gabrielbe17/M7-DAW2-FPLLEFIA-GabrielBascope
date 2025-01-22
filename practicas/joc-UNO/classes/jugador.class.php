<?php
    class Jugador{
        public $mano; //cartas en la mano del jugador, instancia de Baraja
        public int $id;
        
        public function afegir_carta($carta){
            //añade objeto carta a la mano del jugador
            $this->mano[] = new Carta($carta->palo, $carta->num, $carta->id);
        }
        public function eliminar_carta($carta){
            //itera en mano (instancia de baraja), y elimina el objeto $carta pasado por parametro
            
        }
        public function mostrar_ma(){
            //  Mostra totes les cartes del jugador utilitzant pinta_carta().
            

        }
    }
?>