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
    <title>Patrones Creacionales</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
</head>
<body>
    <?php include '../components/nav.php' ?> 
    <section class="container mt-3">
        <?php include '../components/header.php' ?>
        <h1>Patrones Creacionales</h1>
        <p>Los patrones creacionales proporcionan varios mecanismos de creación de objetos que incrementan la flexibilidad y la reutilización del código existente.</p>
        <form action="" method="get">
            <select class="form-select" aria-label="Patrones de Diseño" name="select" onchange="this.form.submit()">
                <option selected disabled>Selecciona un patron de diseño</option>
                <optgroup label="Patrones Creacionales">
                    <option value="../patrons/creacionals/factory.php">Factory Method</option>
                    <option value="../patrons/creacionals/abstract-factory.php">Abstract Factory</option>
                    <option value="../patrons/creacionals/singleton.php">Singleton</option>
                </optgroup>
            </select>
        </form>
    </section>
</body>
</html>