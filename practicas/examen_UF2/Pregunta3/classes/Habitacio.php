<?php

    class Habitacio {
        public string $tipus;
        public float $preu;
        public bool $disponible;


        public function __construct(string $tipus, float $preu, bool $disponible) {
            $this->tipus = $tipus;
            $this->preu = $preu;
            $this->disponible = $disponible;
        }


        public function mostrarInfo() {
            // mostrar infor de habitacion
            echo "Tipus: ". $this->tipus . ", Preu: ". $this->preu . ", Disponible: ". $this->disponible;
        }


    }


?>