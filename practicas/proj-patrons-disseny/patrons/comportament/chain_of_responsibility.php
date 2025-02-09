<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chain of Responsibility</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
</head>
<body>
    <?php include '../../components/nav.php'?>
    <section class="container mt-3">
        <?php include '../../components/header.php'?>

        <div style="max-width: 50rem" class="">
            <h1>Chain of Responsibility</h1>
            <p>Chain of Responsibility es un patrón de diseño de comportamiento que te permite pasar solicitudes a lo largo de una cadena de manejadores. Al recibir una solicitud, cada manejador decide si la procesa o si la pasa al siguiente manejador de la cadena.</p>

            <img src="https://refactoring.guru/images/patterns/content/chain-of-responsibility/chain-of-responsibility.png" alt="">
            <h2 class="mt-5">Problema</h2>
            <div>
                <p>
                Imagina que estás trabajando en un sistema de pedidos online. Quieres restringir el acceso al sistema de forma que únicamente los usuarios autenticados puedan generar pedidos. Además, los usuarios que tengan permisos administrativos deben tener pleno acceso a todos los pedidos.
                </p>
                <p>Tras planificar un poco, te das cuenta de que estas comprobaciones deben realizarse secuencialmente. La aplicación puede intentar autenticar a un usuario en el sistema cuando reciba una solicitud que contenga las credenciales del usuario. Sin embargo, si esas credenciales no son correctas y la autenticación falla, no hay razón para proceder con otras comprobaciones.

                </p>
                <img src="https://refactoring.guru/images/patterns/diagrams/chain-of-responsibility/problem1-es.png">
            </div>
            <h2 class="mt-5">Solución</h2>
            <div>
                <p>El patrón Chain of Responsibility propone una solución que transforma comportamientos específicos en objetos independientes llamados manejadores. La estructura y funcionamiento de esta solución son los siguientes:</p>
                
                <ol>
                    <li ><strong>Manejadores autónomos</strong>: Cada comportamiento o comprobación se encapsula en objetos independientes, con un método único para realizar la tarea específica.</li>
                
                    <li><strong>Encadenamiento</strong>: Los manejadores se vinculan entre sí formando una cadena. Cada manejador tiene una referencia al siguiente en la cadena.</li>
                
                    <li><strong>Propagación de solicitudes</strong>: Cuando un manejador recibe una solicitud, la procesa y luego la pasa al siguiente manejador en la cadena.</li>
                
                    <li><strong>Control de flujo</strong>: Un manejador puede decidir detener el procesamiento y no pasar la solicitud al siguiente eslabón.</li>
                
                    <li><strong>Flexibilidad</strong>: La cadena puede formarse dinámicamente, permitiendo añadir o quitar manejadores según sea necesario.</li>
                
                    <li><strong>Interfaz común</strong>: Todos los manejadores implementan la misma interfaz, lo que permite intercambiarlos y componerlos libremente.</li>
                
                    <li><strong>Desacoplamiento</strong>: El cliente que inicia la solicitud no necesita conocer la estructura de la cadena ni los manejadores específicos.</li>
                </ol>
                
                <p>Esta solución es particularmente útil en sistemas donde una solicitud debe pasar por múltiples etapas de procesamiento, como en sistemas de pedidos o en el manejo de eventos en interfaces gráficas de usuario.</p>
            
                <img src="https://refactoring.guru/images/patterns/diagrams/chain-of-responsibility/solution1-es.png" alt="">
            </div>
        </div>
    </section>
</body>
</html>