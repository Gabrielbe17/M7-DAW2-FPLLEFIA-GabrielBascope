<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iterator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
</head>
<body>
    <?php include '../../components/nav.php'?>
    <section class="container mt-3">
        <?php include '../../components/header.php'?>

        <div style="max-width: 50rem" class="">
            <h1>Iterator</h1>
            <p>Iterator es un patrón de diseño de comportamiento que te permite recorrer elementos de una colección sin exponer su representación subyacente (lista, pila, árbol, etc.).</p>

            <img src="https://refactoring.guru/images/patterns/content/iterator/iterator-es.png" alt="">
            <h2 class="mt-5">Problema</h2>
            <div>
                <p>
                Las colecciones son de los tipos de datos más utilizados en programación. Sin embargo, una colección tan solo es un contenedor para un grupo de objetos.
                </p>

                <img src="https://refactoring.guru/images/patterns/diagrams/iterator/problem1.png">

                <p>La mayoría de las colecciones almacena sus elementos en simples listas, pero algunas de ellas se basan en pilas, árboles, grafos y otras estructuras complejas de datos.</p>
                <br>
                <p>
                Independientemente de cómo se estructure una colección, debe aportar una forma de acceder a sus elementos de modo que otro código pueda utilizar dichos elementos. Debe haber una forma de recorrer cada elemento de la colección sin acceder a los mismos elementos una y otra vez.</p>
            
                <p>Esto puede parecer sencillo pero y si una estructura de datos compleja?. Podria variar bastante y añadir mas y más algoritmos de recorrido nubla el objetivo principal, el almacenamiento eficiente de la información</p>
            </div>

            <h2 class="mt-5">Solución</h2>
            <div>
                <p>El patrón Iterator propone una solución elegante para recorrer colecciones de objetos sin exponer su estructura interna. Los elementos clave de esta solución son:</p>

                <ul>
                    <li><strong>Objeto iterador independiente:</strong> Se extrae la lógica de recorrido de la colección y se coloca en un objeto separado llamado iterador.</li>

                    <li><strong>Encapsulación de detalles:</strong> El iterador encapsula todos los detalles del recorrido, como la posición actual y los elementos restantes.</li>

                    <li><strong>Múltiples iteradores simultáneos:</strong> Varios iteradores pueden recorrer la misma colección al mismo tiempo, de forma independiente.</li>

                    <li><strong>Método principal de extracción:</strong> Los iteradores suelen tener un método principal para extraer elementos de la colección. El cliente lo ejecuta hasta que no devuelve más elementos.</li>

                    <li><strong>Interfaz común:</strong> Todos los iteradores implementan la misma interfaz, lo que permite al código cliente ser compatible con diferentes tipos de colecciones y algoritmos de recorrido.</li>

                    <li><strong>Flexibilidad:</strong> Se pueden crear nuevos iteradores para formas específicas de recorrer una colección sin modificar la colección o el cliente.</li>
                </ul>

                <p>Esta solución permite desacoplar el algoritmo de recorrido de la estructura de la colección, proporcionando una forma estandarizada y flexible de acceder a los elementos de diferentes tipos de colecciones.</p>

                <img src="https://refactoring.guru/images/patterns/diagrams/iterator/solution1.png" alt="">
            </div>
        </div>
    </section>
</body>
</html>