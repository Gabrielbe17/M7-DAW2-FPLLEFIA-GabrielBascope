<?php
    session_start();

    include "classes/carta.class.php";
    include "classes/baraja.class.php";
    include "classes/jugador.class.php";
    include "classes/partida.class.php";

    if (!(isset($_SESSION['nplayers'])) || !(isset($_SESSION['ncards']))) {
        header('Location: index.php');
        exit();
    }

    if (!isset($_SESSION['partida'])) {
        $partida = new Partida();
        $partida->baraja = new Baraja();
        $partida->baraja->crea_baraja();
        $partida->baraja->mezcla();
        $partida->numero_jugadores = $_SESSION['nplayers'];
        $partida->numero_cartas = $_SESSION['ncards'];
        // $partida->carta_en_mesa = array_shift($partida->baraja->conjunto_cartas);
        
        // crear una baraja para cada jugador 
        for ($i=0; $i < $partida->numero_jugadores; $i++) { 
            // creamos un jugador y le pasamos como id la posicion en el array
            $jugador = new Jugador($i);
            $partida->array_jugadores[] = $jugador;
            
            for ($j=0; $j < $partida->numero_cartas; $j++) {
                $carta = array_shift($partida->baraja->conjunto_cartas);
                $jugador->afegir_carta($carta);
            }
        }

        $partida->carta_en_mesa = array_shift($partida->baraja->conjunto_cartas);

        $_SESSION['partida'] = serialize($partida);
    }else{
        $partida = unserialize($_SESSION['partida']);
    }


    function mostrarCartaEnMesa (){
        global $partida;
        // $partida->carta_en_mesa = array_shift($partida->baraja->conjunto_cartas);
        return $partida->carta_en_mesa->pinta_carta();
    }
    

    function mostrarJugadores() {
        global $partida;

        $playersContainer = '';
        for ($i=0; $i < $partida->numero_jugadores; $i++) { 
            $playersContainer .= "
                <div class='d-flex flex-column gap-3 rounded border p-2'>
                    <h3 class='text-decoration-underline'>Jugador " . ($i + 1) . "</h3>
                <div class='d-flex gap-2 justify-items-center mx-auto flex-wrap'>
            ";
                // metodo mostrar ma, y si es el turno del jugador mostrar girado o no
                $jugador = $partida->array_jugadores[$i];
                $playersContainer .= $jugador->mostrar_ma($partida->turno - 1 == $i);

            $playersContainer .= "
                    </div>
                </div>
            ";
        }
        return $playersContainer;
    }

    $error = false;
    function mostrarError(){
        global $error;
        if ($error) {
            return "<div class='alert alert-danger'>Escoge otra carta o roba una</div>";
        }
    }


    $_SESSION['partida'] = serialize($partida);

    if (isset($_GET['num']) && isset($_GET['color']) && isset($_GET['id'])) {
        // logica para controlar el juego
        $color = $_GET['color'];
        $num = $_GET['num'];
        $id = $_GET['id'];


        // bloque para controlar la carta seleccionada, eliminar, poner en mesa, cambiar turno...
        if ($color == $partida->carta_en_mesa->palo || $num == $partida->carta_en_mesa->num) {
                    
            // eliminar carta de baraja de jugador y ponerla al principio de la baraja en mesa
            // incrementar turno
            $jugador = $partida->array_jugadores[$partida->turno - 1];
            $cartaSeleccionada = $jugador->eliminar_carta($id);
        
            // controlar funciones especiales
            switch ($num) {
                case 'skip':
                    $partida->cambiar_turno();
                    break;
                case 'reverse':
                    $partida->cambiar_sentido();
                    break;
                case 'picker':
                    // si sentido horario, anyadir 2 cartas a jugador = turno + 1
                    $indiceJugador = $partida->constante_sentido == "horario" ? $partida->turno : $partida->turno - 2; 
                    $jugadorAfectado = $partida->array_jugadores[$indiceJugador];


                    // var_dump($partida->baraja->conjunto_cartas);
                    // var_dump($jugadorAfectado);
                    for ($i=0; $i < 2; $i++) { 
                        $carta = array_pop($partida->baraja->conjunto_cartas);
                        $jugadorAfectado->afegir_carta($carta);                        
                    }
                    break;
                default:
                    break;
            }

            if ($cartaSeleccionada != null) {
                $partida->carta_en_mesa = $cartaSeleccionada;
                $partida->cambiar_turno();
            }
        
        }else{
            $error = true;
        }    
        

    }

    if (isset($_GET['robar'])) {
        // anyadir carta al jugador del turno actual y pasar al siguiente jugador

        $jugador = $partida->array_jugadores[$partida->turno - 1];
        $carta = array_shift($partida->baraja-> conjunto_cartas);

        $jugador->afegir_carta($carta);

        $partida->cambiar_turno();
        
    }
    
    echo $partida->turno;
    $_SESSION['partida'] = serialize($partida);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UNO Game</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="p-2">
        <a class="btn btn-danger" href="salir.php">Salir del Juego</a>
    </div>
    <div class="container mt-5">
       <h1 class="text-center">Juego UNO</h1>
        <?= mostrarError()?>
       <div class="d-flex gap-5 mt-5">
            <?= mostrarJugadores()?>
       </div>
       <div class="text-center py-3">
           <a href="?robar=true" class="btn btn-dark">Robar</a>
       </div>
       <div class="rounded border p-2 mt-5 text-center">
            <!-- mostrar carta inicial baraja -->
            <p> Carta en Mesa: </p>
            <?= mostrarCartaEnMesa()?>
        </div>
    </div>
</body>
</html>