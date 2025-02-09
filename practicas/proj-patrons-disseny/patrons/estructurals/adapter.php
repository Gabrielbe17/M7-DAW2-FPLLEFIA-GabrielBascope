<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adapter</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
</head>
<body>
    <?php include '../../components/nav.php'?>
    <section class="container mt-3">
        <?php include '../../components/header.php'?>

        <div style="max-width: 50rem" class="">
            <h1>Adapter</h1>
            <p>Adapter es un patrón de diseño estructural que permite la colaboración entre objetos con interfaces incompatibles.</p>

            <img src="https://refactoring.guru/images/patterns/content/adapter/adapter-es.png" alt="">
            <h2 class="mt-5">Problema</h2>
            <div>
                <p>
                    Imagina que estás creando una aplicación de monitoreo del mercado de valores. La aplicación descarga la información de bolsa desde varias fuentes en formato XML para presentarla al usuario con bonitos gráficos y diagramas.
                </p>
                <p>En cierto momento, decides mejorar la aplicación integrando una inteligente biblioteca de análisis de una tercera persona. Pero hay una trampa: la biblioteca de análisis solo funciona con datos en formato JSON.</p>
                <img src="https://refactoring.guru/images/patterns/diagrams/adapter/problem-es.png">
                <br><br><p>Podrías cambiar la biblioteca para que funcione con XML. Sin embargo, esto podría descomponer parte del código existente que depende de la biblioteca. Y, lo que es peor, podrías no tener siquiera acceso al código fuente de la biblioteca, lo que hace imposible esta solución.</p>
            </div>

            <h2 class="mt-5">Solución</h2>
            <div>
                <p>La solución propuesta por el patrón Adapter se basa en crear un objeto intermediario llamado "adaptador" que permite la comunicación entre interfaces incompatibles. Los elementos clave de esta solución son:</p>

                <ol>
                    <li><strong>Objeto adaptador:</strong> Es un objeto especial que convierte la interfaz de un objeto para que otro objeto pueda entenderla.</li>
                    <li><strong>Envoltura:</strong> El adaptador envuelve uno de los objetos, ocultando la complejidad de la conversión que ocurre internamente.</li>
                    <li><strong>Interfaz compatible:</strong> El adaptador implementa una interfaz que es compatible con uno de los objetos existentes.</li>
                    <li><strong>Conversión de llamadas:</strong> Cuando el adaptador recibe una llamada, la traduce y la pasa al objeto adaptado en el formato que este espera.</li>
                    <li><strong>Bidireccionalidad:</strong> En algunos casos, se pueden crear adaptadores que convierten llamadas en ambas direcciones.</li>
                </ol>

                <img src="https://refactoring.guru/images/patterns/diagrams/adapter/solution-es.png" alt="">

                <h3>Ejemplo: Aplicación del mercado de valores</h2>
                <p>En el ejemplo de la aplicación del mercado de valores, la solución propone:</p>
                <ol>
                    <li>Crear adaptadores de XML a JSON para cada clase de la biblioteca de análisis.</li>
                    <li>Ajustar el código para que se comunique con la biblioteca solo a través de estos adaptadores.</li>
                    <li>Los adaptadores traducen los datos XML entrantes a estructuras JSON.</li>
                    <li>Luego, pasan las llamadas a los métodos apropiados de los objetos de análisis envueltos.</li>
                </ol>

                <p>Esta solución permite que sistemas con formatos de datos incompatibles (XML y JSON en este caso) puedan trabajar juntos sin modificar su código original.</p>
                <br>
                <img src="https://refactoring.guru/images/patterns/diagrams/adapter/structure-object-adapter.png" alt="">
            </div>
        </div>
    </section>
</body>
</html>