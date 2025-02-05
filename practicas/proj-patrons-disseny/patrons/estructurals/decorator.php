<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Decorator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
</head>
<body>
    <?php include '../../components/nav.php'?>
    <section class="container mt-3">
        <?php include '../../components/header.php'?>

        <div style="max-width: 50rem" class="">
            <h1>Decorator</h1>
            <p>Decorator es un patrón de diseño estructural que te permite añadir funcionalidades a objetos colocando estos objetos dentro de objetos encapsuladores especiales que contienen estas funcionalidades.</p>

            <img src="https://refactoring.guru/images/patterns/content/decorator/decorator.png" alt="">
            <h2 class="mt-5">Problema</h2>
            <div>
                <p>
                    Imagina que estás trabajando en una biblioteca de notificaciones que permite a otros programas notificar a sus usuarios acerca de eventos importantes.
                </p>
                <p>La versión inicial de la biblioteca se basaba en la clase Notificador que solo contaba con unos cuantos campos, un constructor y un único método send. El método podía aceptar un argumento de mensaje de un cliente y enviar el mensaje a una lista de correos electrónicos que se pasaban a la clase notificadora a través de su constructor. Una aplicación de un tercero que actuaba como cliente debía crear y configurar el objeto notificador una vez y después utilizarlo cada vez que sucediera algo importante.</p>

                <img src="https://refactoring.guru/images/patterns/diagrams/decorator/problem1-es.png" alt="">

                <p>En cierto momento te das cuenta de que los usuarios de la biblioteca esperan algo más que unas simples notificaciones por correo. A muchos de ellos les gustaría recibir mensajes SMS sobre asuntos importantes. Otros querrían recibir las notificaciones por Facebook y, por supuesto, a los usuarios corporativos les encantaría recibir notificaciones por Slack.</p>

                <img src="https://refactoring.guru/images/patterns/diagrams/decorator/problem2.png" alt="">
            
                <p>
                    Inicialmente, se extendió la clase Notificador creando subclases para cada método de notificación adicional. Esto permitía a los clientes usar la clase específica para sus notificaciones.
                </p>

                <p>
                    Sin embargo, surgió la necesidad de usar múltiples tipos de notificación simultáneamente, como en situaciones de emergencia donde se desea notificar por todos los canales posibles.
                </p>

                <p>
                    Se intentó resolver creando subclases que combinaran varios métodos de notificación, pero esto resultó en una proliferación excesiva de código, tanto en la biblioteca como en el lado del cliente, lo que no era una solución óptima.
                </p>

                <img src="https://refactoring.guru/images/patterns/diagrams/decorator/problem3.png" alt="">
            </div>
        </div>
    </section>
</body>
</html>