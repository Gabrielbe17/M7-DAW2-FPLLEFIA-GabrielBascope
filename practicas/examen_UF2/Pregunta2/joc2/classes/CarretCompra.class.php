<?php
    class CarretCompra {
        // permeti afegir productes i calcular el total.
        public $carrito = [];


        public function afegirProducte($producte) {
            // añadimos objeto producto al array
            $this->carrito[] = $producte;
        }

        public function mostrarTotal(){
            return count($this->carrito);
        }

        public function mostrarCarrito(){
            $listaProd = "";

            foreach ($this->carrito as $producto) {
                $listaProd .= "
                    <tr>
                        <td>{$producto->nom}</td>
                        <td>{$producto->preu}</td>
                    </tr>
                ";
            }   
    
            return $listaProd;
        }
    }

?>