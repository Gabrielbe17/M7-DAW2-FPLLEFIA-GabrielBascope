<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Composite</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
</head>
<body>
    <?php include '../../components/nav.php'?>
    <section class="container mt-3">
        <?php include '../../components/header.php'?>

        <div style="max-width: 50rem" class="">
            <h1>Composite</h1>
            <p>Composite es un patrón de diseño estructural que te permite componer objetos en estructuras de árbol y trabajar con esas estructuras como si fueran objetos individuales.</p>

            <img src="https://refactoring.guru/images/patterns/content/composite/composite.png" alt="">
            <h2 class="mt-5">Problema</h2>
            <div>
                <p>
                    El uso del patrón Composite sólo tiene sentido cuando el modelo central de tu aplicación puede representarse en forma de árbol.
                </p>
                <p>  Por ejemplo, imagina que tienes dos tipos de objetos: <code>Productos</code> y <code>Cajas</code>. Una <code>Caja</code> puede contener varios <code>Productos</code> así como cierto número de <code>Cajas</code> más pequeñas. Estas <code>Cajas</code> pequeñas también pueden contener algunos <code>Productos</code> o incluso <code>Cajas</code> más pequeñas, y así sucesivamente.</p>
                <p>Digamos que decides crear un sistema de pedidos que utiliza estas clases. Los pedidos pueden contener productos sencillos sin envolver, así como cajas llenas de productos... y otras cajas. ¿Cómo determinarás el precio total de ese pedido?</p>
                <img src="https://refactoring.guru/images/patterns/diagrams/composite/problem-es.png">
                <br><br><p>Puedes intentar la solución directa: desenvolver todas las cajas, repasar todos los productos y calcular el total. Esto sería viable en el mundo real; pero en un programa no es tan fácil como ejecutar un bucle. Tienes que conocer de antemano las clases de Productos y Cajas a iterar, el nivel de anidación de las cajas y otros detalles desagradables. Todo esto provoca que la solución directa sea demasiado complicada, o incluso imposible.</p>
            </div>

            <h2 class="mt-5">Solución</h2>
            <div>
                <p>
                    El patrón Composite sugiere trabajar con <code>Productos</code> y <code>Cajas</code> a través de una interfaz común que declara un método para calcular el precio total. Este método funciona de la siguiente manera:
                </p>

                <ul>
                    <li>Para un <code>Producto</code>: Simplemente devuelve el precio del producto.</li>
                    <li>Para una <code>Caja</code>: 
                        <ul>
                            <li>Recorre cada artículo dentro de la caja.</li>
                            <li>Pregunta el precio de cada artículo.</li>
                            <li>Suma todos los precios para obtener el total de la caja.</li>
                            <li>Si contiene cajas más pequeñas, el proceso se repite recursivamente.</li>
                            <li>Puede añadir costos adicionales (como empaquetado) al precio final.</li>
                        </ul>
                    </li>
                </ul>

                <p>
                    La ventaja principal de esta solución es que permite tratar de manera uniforme a objetos individuales y compuestos. No es necesario preocuparse por las clases concretas de los objetos en el árbol. Cuando se invoca un método, los objetos pasan la solicitud a lo largo de la estructura de árbol automáticamente.
                </p>
                <img src="https://refactoring.guru/images/patterns/diagrams/composite/example.png" alt="">
            </div>
        </div>
    </section>
</body>
</html>