<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Command</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
</head>
<body>
    <?php include '../../components/nav.php'?>
    <section class="container mt-3">
        <?php include '../../components/header.php'?>

        <div style="max-width: 50rem" class="">
            <h1>Command</h1>
            <p>Command es un patrón de diseño de comportamiento que convierte una solicitud en un objeto independiente que contiene toda la información sobre la solicitud. Esta transformación te permite parametrizar los métodos con diferentes solicitudes, retrasar o poner en cola la ejecución de una solicitud y soportar operaciones que no se pueden realizar.</p>

            <img src="https://refactoring.guru/images/patterns/content/command/command-es.png" alt="">
            <h2 class="mt-5">Problema</h2>
            <div>
                <p>
                Imagina que estás trabajando en una nueva aplicación de edición de texto. Tu tarea actual consiste en crear una barra de herramientas con unos cuantos botones para varias operaciones del editor. Creaste una clase Botón muy limpia que puede utilizarse para los botones de la barra de herramientas y también para botones genéricos en diversos diálogos.
                </p>

                <img src="https://refactoring.guru/images/patterns/diagrams/command/problem1.png">

                <p>Aunque todos estos botones se parecen, se supone que hacen cosas diferentes. ¿Dónde pondrías el código para los varios gestores de clics de estos botones? La solución más simple consiste en crear cientos de subclases para cada lugar donde se utilice el botón. Estas subclases contendrán el código que deberá ejecutarse con el clic en un botón.</p>
            
                <p>Pronto te das cuenta de que esta solución es muy deficiente. En primer lugar, tienes una enorme cantidad de subclases, lo cual no supondría un problema si no corrieras el riesgo de descomponer el código de esas subclases cada vez que modifiques la clase base Botón. Dicho de forma sencilla, tu código GUI depende torpemente del volátil código de la lógica de negocio.</p>
            </div>

            <h2 class="mt-5">Solución</h2>
            <div>
                <p>El patrón Command propone una solución elegante para desacoplar la interfaz de usuario (GUI) de la lógica de negocio en una aplicación. Los elementos clave de esta solución son:</p>

                <ul>
                    <li><strong>Encapsulación de solicitudes:</strong> En lugar de que los objetos GUI invoquen directamente métodos de la lógica de negocio, se crea una clase Command separada para cada operación.</li>

                    <li><strong>Interfaz común:</strong> Todos los comandos implementan una interfaz común, generalmente con un único método execute() sin parámetros.</li>

                    <li><strong>Delegación:</strong> Los objetos GUI delegan la ejecución de operaciones a los objetos Command correspondientes.</li>

                    <li><strong>Preconfiguración:</strong> Los comandos se preconfigurran con la información necesaria para ejecutar la operación, eliminando la necesidad de pasar parámetros en el momento de la ejecución.</li>

                    <li><strong>Flexibilidad:</strong> Los comandos pueden vincularse dinámicamente a elementos de la GUI, permitiendo cambiar el comportamiento en tiempo de ejecución.</li>
                </ul>

                <h3>Beneficios de esta estructura:</h3>

                <ul>
                    <li>Simplifica la implementación de elementos GUI como botones, menús y atajos.</li>
                    <li>Permite reutilizar comandos entre diferentes elementos de la interfaz.</li>
                    <li>Facilita la adición de nuevas operaciones sin modificar la GUI existente.</li>
                    <li>Posibilita implementar funcionalidades avanzadas como operaciones de deshacer/rehacer, encolado de comandos o ejecución remota.</li>
                </ul>

                <p>En resumen, el patrón Command crea una capa intermedia flexible entre la GUI y la lógica de negocio, mejorando la modularidad y extensibilidad del sistema.</p>
                <img src="https://refactoring.guru/images/patterns/diagrams/command/structure.png" alt="">
            </div>
        </div>
    </section>
</body>
</html>