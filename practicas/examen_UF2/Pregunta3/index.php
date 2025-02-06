<?php
    session_start();

    include "./classes/Habitacio.php";
    include "./classes/Hotel.php";


?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva Hoteles</title>
</head>
<body>
    <form method="get" action="">
        <label for="numGuess">Tipo:</label>
        <input type="number" id="numGuess" name="numGuess" min="1" required><br><br>
            
        <input type="submit" value="Reservar">
    </form>
</body>
</html>