<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bridge</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
</head>
<body>
    <?php include '../../components/nav.php'?>
    <section class="container mt-3">
        <?php include '../../components/header.php'?>

        <div style="max-width: 50rem" class="">
            <h1>Bridge</h1>
            <p>Bridge es un patrón de diseño estructural que te permite dividir una clase grande, o un grupo de clases estrechamente relacionadas, en dos jerarquías separadas (abstracción e implementación) que pueden desarrollarse independientemente la una de la otra.</p>

            <img src="https://refactoring.guru/images/patterns/content/bridge/bridge.png" alt="">
            <h2 class="mt-5">Problema</h2>
            <div>
                <p>
                Digamos que tienes una clase geométrica <code>Forma</code> con un par de subclases: <code>Círculo</code> y <code>Cuadrado</code>. Deseas extender esta jerarquía de clase para que incorpore colores, por lo que planeas crear las subclases de forma <code>Rojo</code> y <code>Azul</code>. Sin embargo, como ya tienes dos subclases, tienes que crear cuatro combinaciones de clase, como <code>CírculoAzul</code> y <code>CuadradoRojo</code>.
                </p>
                <img src="https://refactoring.guru/images/patterns/diagrams/bridge/problem-es.png">
                <br><br><p>Añadir nuevos tipos de forma y color a la jerarquía hará que ésta crezca exponencialmente. Por ejemplo, para añadir una forma de triángulo deberás introducir dos subclases, una para cada color. Y, después, para añadir un nuevo color habrá que crear tres subclases, una para cada tipo de forma. Cuanto más avancemos, peor será.</p>
            </div>
            <h2 class="mt-5">Solución</h2>
            <div>
                <p>La solución propuesta por el patrón Bridge aborda el problema de la explosión de clases que ocurre cuando se intenta extender una clase en dos dimensiones independientes (en este caso, forma y color). Los elementos clave de esta solución son:</p>

                <ol>
                    <li><strong>Separación de dimensiones:</strong> En lugar de usar herencia múltiple, el patrón Bridge separa las dimensiones en jerarquías de clases independientes.</li>
                    <li><strong>Composición sobre herencia:</strong> Se utiliza la composición de objetos en lugar de la herencia para relacionar las dimensiones.</li>
                    <li><strong>Creación de un "puente":</strong> Se establece una referencia en la clase principal (en este caso, <code>Forma</code>) que "apunta" a un objeto de la otra dimensión (<code>Color</code>).</li>
                    <li><strong>Delegación de responsabilidades:</strong> La clase principal delega las operaciones específicas de la otra dimensión al objeto referenciado.</li>
                </ol>

                <h3>Ejemplo: Formas y Colores</h3>
                <p>En el ejemplo dado:</p>

                <ul>
                    <li>Se crea una jerarquía separada para <code>Color</code> con subclases como <code>Rojo</code> y <code>Azul</code>.</li>
                    <li>La clase <code>Forma</code> mantiene una referencia a un objeto <code>Color</code>.</li>
                    <li><code>Forma</code> delega cualquier trabajo relacionado con el color al objeto <code>Color</code> vinculado.</li>
                    <li>Esta estructura permite añadir nuevos colores o formas sin afectar la otra jerarquía.</li>
                </ul>
            </div>
        </div>
    </section>
</body>
</html>