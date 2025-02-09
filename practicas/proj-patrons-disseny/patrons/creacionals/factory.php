<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factory Method</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
</head>
<body>
    <?php include '../../components/nav.php'?>
    <section class="container mt-3">
        <?php include '../../components/header.php'?>

        <div style="max-width: 50rem" class="">
            <h1>Factory Method</h1>
            <p>Factory Method es un patrón de diseño creacional que proporciona una interfaz para crear objetos en una superclase, mientras permite a las subclases alterar el tipo de objetos que se crearán.</p>

            <img src="/img/factory-method-es.png" alt="">
            <h2 class="mt-5">Problema</h2>
            <p>
                Imagina que estás creando una aplicación de gestión logística. La primera versión de tu aplicación sólo es capaz de manejar el transporte en camión, por lo que la mayor parte de tu código se encuentra dentro de la clase Camión.
                Al cabo de un tiempo, tu aplicación se vuelve bastante popular. Cada día recibes decenas de peticiones de empresas de transporte marítimo para que incorpores la logística por mar a la aplicación.
                <br><br>
                El problema está en que para acoplar más vehiculos el código acabaria sucio, pues si todo está en la clase Camión, tendrias que ir añadiendo condicionales que controlasen esos vehiculos, cambiando constantemente el funcionamiento de la aplicación.
            </p>

            <h2 class="mt-5">Solución</h2>
            <div>
                <p>El patrón Factory Method propone una solución para crear objetos sin especificar la clase exacta del objeto que se creará. Los elementos clave de esta solución son:</p>

                <ol>
                    <li><strong>Método fábrica:</strong> En lugar de usar directamente el operador <code>new</code>, se utiliza un método especial (el método fábrica) para crear objetos.</li>

                    <li><strong>Flexibilidad en subclases:</strong> Las subclases pueden sobrescribir el método fábrica para cambiar la clase de los objetos que se crean.</li>

                    <li><strong>Interfaz común:</strong> Los productos creados por el método fábrica deben compartir una interfaz o clase base común.</li>

                    <li><strong>Jerarquía de productos:</strong> Se crea una estructura donde todos los productos siguen la misma interfaz, pero la implementan de manera diferente.</li>

                    <li><strong>Desacoplamiento del código cliente:</strong> El código que usa el método fábrica trabaja con los productos a través de su interfaz común, sin necesidad de conocer las clases concretas.</li>
                </ol>

                <p>Esta estructura permite una mayor flexibilidad en la creación de objetos y facilita la extensión del código para incluir nuevos tipos de productos sin modificar el código existente.</p>

                <h2>Ejemplo</h2>
                <p>En un sistema de logística, tanto <code>Camión</code> como <code>Barco</code> implementan la interfaz <code>Transporte</code>. Los métodos fábrica en <code>LogísticaTerrestre</code> y <code>LogísticaMarítima</code> crean los objetos específicos, pero el código cliente los trata uniformemente como <code>Transporte</code>.</p>
            
                <img src="https://refactoring.guru/images/patterns/diagrams/factory-method/example.png" alt="">
            </div>
        </div>
    </section>
</body>
</html>