<?php
    session_start();

    include "./classes/Producte.class.php"; 
    include "./classes/CarretCompra.class.php"; 

    
    if (!isset($_SESSION["carrito"])) {
        $_SESSION["carrito"] = serialize(new CarretCompra());
    }
    
    $carrito = unserialize($_SESSION['carrito']);


    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if(isset($_GET["producto"]) && isset($_GET["precio"])){
            $nomProducto = $_GET["producto"];
            $precio = $_GET["precio"];
    
            // si hay metodo get, añadir a carrito
            $producto = new Producte($nomProducto, $precio);
            $carrito->afegirProducte($producto);

            $_SESSION['carrito'] = serialize($carrito);
        }
    }
  
    $_SESSION['carrito'] = serialize($carrito);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
</head>
<body>
    <br>
    <form method="get" action="">
        <label for="producto">Producto: </label>
        <input type="text" id="producto" name="producto" required><br><br>
        <br>
        <label for="precio">Precio: </label>
        <input type="number" id="precio" name="precio" min="1" required><br><br>
            
        <input type="submit" value="Añadir Producto">
    </form>


    <div class="">
        <h2>Productos En Carrito</h2>
        <p>Total: <?= $carrito->mostrarTotal() ?></p>
    </div>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Precio</th>
            </tr>
        </thead>
        <tbody>
            <?= $carrito->mostrarCarrito() ?>
        </tbody>
    </table>
    
</body>
</html>