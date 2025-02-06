<?php
    session_start();

    include "./classes/JocAdivinacio.class.php";

    if (!isset($_SESSION["joc"])) {
        $_SESSION["joc"] = serialize(new JocAdivinacio());
    }

    $joc = unserialize($_SESSION['joc']);


    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if(isset($_GET["numGuess"])){
            $num = $_GET["numGuess"];
    
            echo $joc->comprovar($num);
        }
    }

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulari</title>
</head>
<body>
    <br>
    <form method="get" action="">
        <label for="numGuess">Numero:</label>
        <input type="number" id="numGuess" name="numGuess" min="1" required><br><br>
            
        <input type="submit" value="Enviar">
    </form>

</body>
</html>