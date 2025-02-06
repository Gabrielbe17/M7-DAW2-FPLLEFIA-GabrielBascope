<?php
    class Factura{
        public string $client;
        public string $producte;
        public int $quantitat;
        public int $preuUnitari;


        public function __construct(string $client, string $producte, int $quantitat, int $preuUnitari) {
            $this->client = $client;
            $this->producte = $producte;
            $this->quantitat = $quantitat;
            $this->preuUnitari = $preuUnitari;
        }

        public function calcularTotal(){
            return $this->quantitat * $this->preuUnitari;
        }
        public function aplicarDescompte($percentatge){
            return $this->calcularTotal() * $percentatge;
        }
        

    }
?>