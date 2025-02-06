<?php
    session_start();

    include "./classes/Factura.class.php"; 

    if (!isset($_SESSION["facturas"])) {
        $_SESSION["facturas"] = [];
    }

    $facturas = [
        new Factura("Cliente1", "PC", rand(1, 3), rand(500, 2000)),
        new Factura("Cliente2", "silla", rand(1, 3), rand(20, 200)),
        new Factura("Cliente3", "escritorio", rand(1, 3), rand(20, 200)),
        new Factura("Cliente4", "pizarra", rand(1, 3), rand(20, 200)),
        new Factura("Cliente5", "Reloj", rand(1, 3), rand(20, 200))
    ];

    $_SESSION["facturas"] = $facturas;

    function mostrarFacturasGeneradas(){
        $listaProd = "";

        foreach ($_SESSION["facturas"] as $factura) {
            $listaProd .= "
                <tr>
                    <td>{$factura->client}</td>
                    <td>{$factura->producte}</td>
                    <td>{$factura->quantitat}</td>
                    <td>{$factura->preuUnitari}</td>
                    <td>{$factura->calcularTotal()}</td>
                </tr>
            ";
        }   

        return $listaProd;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facturas</title>
</head>
<body>
    <h2>Facturas generadas</h2>
    <!--factures generades aleatòriament i aplica un descompte a una d'elles. -->
    <table class="table">
        <thead>
            <tr>
            <th scope="col">Cliente</th>
            <th scope="col">Producto</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Precio Unitario</th>
            <th scope="col">Total</th>
            </tr>
        </thead>
        <tbody>
            <?= mostrarFacturasGeneradas()?>
        </tbody>
    </table>
    
</body>
</html>