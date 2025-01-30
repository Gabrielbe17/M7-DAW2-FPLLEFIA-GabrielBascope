<?php
    if (isset($_GET['select'])) {
        header('Location: '.$_GET['select']);
        exit();
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patrones Estructurales</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
</head>
<body>
    <?php include '../components/nav.php'?>
    <section class="container mt-3">
        <?php include '../components/header.php' ?>
        <h1>Patrones Estructurales</h1>
        <p>Explican cómo ensamblar objetos y clases en estructuras más grandes a la vez que se mantiene la flexibilidad y eficiencia de la estructura.</p>

        <form action="" method="get">
            <select class="form-select" aria-label="Patrones de Diseño Estructurales" name="select" onchange="this.form.submit()">
                <option selected>Selecciona un Patrón Estructural</option>
                <optgroup label="Patrones Estructurales">
                    <option value="../patrons/estructurals/adapter.php">Adapter</option>
                    <option value="../patrons/estructurals/bridge.php">Bridge</option>
                    <option value="../patrons/estructurals/composite.php">Composite</option>
                    <option value="../patrons/estructurals/decorator.php">Decorator</option>
                    <option value="../patrons/estructurals/facade.php">Facade</option>
                    <option value="../patrons/estructurals/flyweight.php">Flyweight</option>
                    <option value="../patrons/estructurals/proxy.php">Proxy</option>
                </optgroup>
            </select>

        </form>

    </section>
</body>
</html>