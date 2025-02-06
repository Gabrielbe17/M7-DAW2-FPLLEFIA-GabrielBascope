<?php
    session_start();

    include "./classes/Usuari.class.php"; 

    $error = false;
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if(isset($_GET["nombre"]) && isset($_GET["edat"]) && isset($_GET["email"])){
            $nombre = $_GET["nombre"];
            $edat = $_GET["edat"];
            $email = $_GET["email"];
    
            $usuario = new Usuari($nombre, $edat, $email);

            if ($usuario->validarDades()) {
                $_SESSION["usuario"] = serialize($usuario);
                echo "<p style='color: green'>Usuario guardado correctamente.</p>";
            } else {
                $error = true;
            }
        }
    }

    function mostrarMensajeError(){
        global $error;
        if($error){
            echo "<p style='color: red'>Los datos introducidos no son válidos.</p>";
        }else{
            echo "";
        }
    }
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
        <label for="nombre">Nombre: </label>
        <input type="text" id="nombre" name="nombre" required><br><br>
        
        <br>
        
        <label for="edat">Edat: </label>
        <input type="number" id="edat" name="edat" required><br><br>
            
        <br>
   
        <label for="email">Correo: </label>
        <input type="text" id="email" name="email" required><br><br>
            
        <input type="submit" value="Entrar">

        <?= mostrarMensajeError() ?>
    </form>  
</body>
</html>
