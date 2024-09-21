<?php
    function numAleatori(){
        $numRandom = rand(0, 100);
        if ($numRandom % 2 == 0) {
            echo "<div class = 'bg-primary p-3 text-center display-6 text-light'>$numRandom</div>";
        }else{
            echo "<div class = 'bg-warning p-3 text-center display-6 text-light'>$numRandom</div>";
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excercici 3</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    
</head>
<body style="font-family: 'Poppins', sans-serif;">
    <div class="contenido" style="max-width: 70rem; margin:0 auto; padding: 2rem;">
        <h1>Excercici 3 - Nombre aleatori parell o senar</h1>
        <h3>Nombre parell - <span class="text-primary">Blau</span></h3>
        <h3>Nombre senar - <span class="text-warning">Groc</span></h3><br>
        <?php
            numAleatori();
        ?>
    </div>
</body>
</html>