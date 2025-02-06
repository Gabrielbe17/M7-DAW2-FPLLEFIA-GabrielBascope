<?php

    class Usuari {
        public $nom;
        public $edat; 
        public $correu;

        public function __construct(string $nom, int $edat, string $correu) {
            $this->nom = $nom;
            $this->edat = $edat;
            $this->correu = $correu;
        }



        public function validarDades(){
            // que comprovi si l’edat és un número i si el correu té un format vàlid.
            $correuValid = str_contains($this->correu, "@gmail.com");
            return gettype($this->edat) === "integer" && $correuValid;
        }

    }


?>