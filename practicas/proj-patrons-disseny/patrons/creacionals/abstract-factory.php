<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abstract Factory</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
</head>
<body>
    <?php include '../../components/nav.php'?>
    <section class="container mt-3">
        <?php include '../../components/header.php'?>

        <div style="max-width: 70rem" class="">
            <h1>Abstracty Factory</h1>
            <p>Abstract Factory es un patrón de diseño creacional que nos permite producir familias de objetos relacionados sin especificar sus clases concretas.</p>

            <img src="https://refactoring.guru/images/patterns/content/abstract-factory/abstract-factory-es.png" alt="">
            <h2 class="mt-5">Problema</h2>
            <div>
                <p>
                    Imagina que estás creando un simulador de tienda de muebles. Tu código está compuesto por clases que representan lo siguiente:
                </p>
                <ol>
                    <li>
                        Una familia de productos relacionados, digamos: Silla + Sofá + Mesilla.
                    </li>
                    <li>
                        Algunas variantes de esta familia. Por ejemplo, los productos Silla + Sofá + Mesilla están disponibles en estas variantes: Moderna, Victoriana, ArtDecó.
                    </li>
                </ol>
                <p>Necesitamos una forma de crear objetos individuales de mobiliario para que combinen con otros objetos de la misma familia. Los clientes se enfadan bastante cuando reciben muebles que no combinan.</p>
                <img src="https://refactoring.guru/images/patterns/content/abstract-factory/abstract-factory-comic-1-es.png?id=426c7300b9895e39cfa7a6440bcc026f">
                <p>Además, no queremos cambiar el código existente al añadir al programa nuevos productos o familias de productos. Los comerciantes de muebles actualizan sus catálogos muy a menudo, y debemos evitar tener que cambiar el código principal cada vez que esto ocurra.</p>
            </div>
            <h2 class="mt-5">Solución</h2>
            <div>                
                <p>El patrón Abstract Factory propone una solución estructurada para crear familias de objetos relacionados sin especificar sus clases concretas. Esto se logra mediante los siguientes pasos:</p>

                <ol>
                <li>
                    <strong>Abstracción de productos:</strong>
                    Se crean interfaces para cada tipo de producto en la familia (por ejemplo, Silla, Sofá, Mesilla).
                </li>
                <li>
                    <strong>Fábrica abstracta:</strong>
                    Se define una interfaz que declara métodos para crear cada tipo de producto abstracto.
                </li>
                <li>
                    <strong>Fábricas concretas:</strong>
                    Se implementan versiones específicas de la fábrica abstracta, cada una correspondiente a una variante particular de productos (por ejemplo, Moderna, Victoriana).
                </li>
                <li>
                    <strong>Productos concretos:</strong>
                    Se crean clases que implementan las interfaces de productos para cada variante.
                </li>
                <li>
                    <strong>Uso en el cliente:</strong>
                    El código cliente trabaja con las interfaces abstractas, permitiendo intercambiar fábricas y productos sin modificar el código.
                </li>
                </ol>

                <p>Esta estructura permite crear conjuntos de objetos relacionados y asegura su compatibilidad, a la vez que oculta los detalles de implementación al código cliente.</p>

                <img src="https://refactoring.guru/images/patterns/diagrams/abstract-factory/solution1.png" alt="">
                <img src="https://refactoring.guru/images/patterns/diagrams/abstract-factory/solution2.png" alt="">
            </div>
        </div>
    </section>
</body>
</html>