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
        
        public function eliminar_carta($id){
            //itera en mano (instancia de baraja), y elimina el objeto $carta pasado por parametro
            foreach ($this->mano->conjunto_cartas as $index => $cartabaraja) {
                if ($id == $cartabaraja->id) {
                    //eliminar y retornar carta seleccionada 
                    array_splice($this->mano->conjunto_cartas, $index, 1);
                    return $cartabaraja;
                }
            }
        }
        public function mostrar_ma($esSuTurno){
            //  Mostra totes les cartes del jugador utilitzant pinta_carta().
            $jugadorCartas = '';

            foreach ($this->mano->conjunto_cartas as $carta) {
                if ($esSuTurno) {
                    $jugadorCartas .= $carta->pinta_carta_link();
                }else{
                    $jugadorCartas .= $carta->pinta_carta_girada();
                }
            }
            return $jugadorCartas;
        }
    }
?>