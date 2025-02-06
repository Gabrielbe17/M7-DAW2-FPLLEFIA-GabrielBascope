<?php

    class JocAdivinacio {
        
        public $numeroSecret;
        public $intents = 0;

        public function __construct() {
            $this->numeroSecret = rand(1, 20);
            // $this->intents = 0;
        }

        public function comprovar($num){
            if($num > $this->numeroSecret){
                return "El numero introduit és més gran";
            }else if($num < $this->numeroSecret){
                return "El numero introduit és més petit";
            }else{
                return "Correcte!";
            }
        }

    }


?>