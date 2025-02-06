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
            $edadValida = is_numeric($this->edat);
            
            $correuValid = strpos($this->correu, "@gmail.com") !== false;
            
            return $edadValida && $correuValid;
        }
        

    }


?>