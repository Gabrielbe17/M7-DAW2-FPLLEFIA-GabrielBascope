<?php

    class Producte {
        public $nom;
        public $preu;

        public function __construct(string $nom, float $preu) {
            $this->nom = $nom;
            $this->preu = $preu;
        }
    }

?>