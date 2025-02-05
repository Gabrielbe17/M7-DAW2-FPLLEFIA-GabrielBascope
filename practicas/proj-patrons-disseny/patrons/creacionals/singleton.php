<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Singleton</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
</head>
<body>
    <?php include '../../components/nav.php'?>
    <section class="container mt-3">
        <?php include '../../components/header.php'?>

        <div style="max-width: 50rem" class="">
            <h1>Singleton</h1>
            <p>Singleton es un patrón de diseño creacional que nos permite asegurarnos de que una clase tenga una única instancia, a la vez que proporciona un punto de acceso global a dicha instancia.</p>

            <img src="https://refactoring.guru/images/patterns/content/singleton/singleton.png" alt="">
            <h2 class="mt-5">Problema</h2>
            <div>
                <p>
                    El patrón Singleton resuelve dos problemas al mismo tiempo, vulnerando el Principio de responsabilidad única:
                </p>
                <p>
                    1. <b>Garantizar que una clase tenga una única instancia.</b>
                    El patrón Singleton asegura que una clase tenga solo una instancia, útil para gestionar recursos compartidos como bases de datos. Al intentar crear un nuevo objeto, se devuelve la instancia existente en lugar de una nueva. Este comportamiento no se puede lograr con un constructor normal, que siempre crea objetos nuevos.

                </p>
                <img src="https://refactoring.guru/images/patterns/content/singleton/singleton-comic-1-es.png">
                <p>
                    2. <b>Proporcionar un punto de acceso global a dicha instancia</b> El patrón Singleton ofrece un acceso global a una instancia única, mejorando la seguridad frente a variables globales que pueden ser sobrescritas. Permite acceder al objeto desde cualquier parte del programa, pero protege contra modificaciones no deseadas. Además, centraliza el código en una clase, evitando su dispersión por todo el programa. Esto es especialmente útil si otras partes del código ya dependen de esa clase.

                    El término "singleton" se ha vuelto tan común que a menudo se usa para patrones que solo abordan uno de estos aspectos, aunque técnicamente no sean Singletons completos.
                </p>
            </div>
        </div>
    </section>
</body>
</html>