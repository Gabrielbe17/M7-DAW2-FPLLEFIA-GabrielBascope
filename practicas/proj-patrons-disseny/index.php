
<?php
    
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patrones de Diseño</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .cards{
            max-width: 40rem;
            margin: 0 auto;
        }
        a{
            text-decoration: none;
            color: black;
        }
    </style>
</head>
<body class="">
    <?php include 'components/nav.php' ?>
    <section class="container mt-5">
        <h1 class="text-center">Patrones de Diseño</h1>

        <div class="text-center">
            <p>Los patrones de diseño (design patterns) son soluciones
            habituales a problemas comunes en el diseño de
            software. Cada patrón es como un plano que se
            puede personalizar para resolver un problema de
            diseño particular de tu código.</p>
        </div>

        <div class="d-flex flex-column gap-4 mt-5 cards text-center">
            <a href="pages/creacionals.php">
                <div class="p-5 rounded shadow-lg border">
                    De Creació
                </div>
            </a>
            <a href="pages/estructurals.php">
                <div class="p-5 rounded shadow-lg w-full">
                    Estructurals
                </div>
            </a>
            <a href="pages/comportament.php">
                <div class="p-4 rounded shadow-lg">
                    De Comportament
                </div>
            </a>
        </div>
    </section>
</body>
</html>