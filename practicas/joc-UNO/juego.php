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
        $_SESSION['partida'] = serialize(new Partida());
    }

    $partida = unserialize($_SESSION['partida']);

    // if (!isset($_SESSION['partida'])) {

        // $partida = new Partida();
        $partida->baraja = new Baraja();
        $partida->baraja->crea_baraja();
        $partida->baraja->mezcla();


        // crear una baraja para cada jugador 
        for ($i=0; $i < $_SESSION['nplayers']; $i++) { 
            // creamos un jugador y le pasamos como id la posicion en el array
            $jugador = new Jugador($i);
            $partida->array_jugadores[] = $jugador;

            for ($j=0; $j < $_SESSION['ncards']; $j++) {
                $carta = array_shift($partida->baraja->conjunto_cartas);
                $jugador->afegir_carta($carta);

            }
        }

        $_SESSION['partida'] = serialize($partida);
    // }else{
    //     $partida = unserialize($_SESSION['partida']);
    // }


    // Objeto partida. Se crea baraja al ingresar en num de jugadores y cartas


    // version 1

    // $partida = new Partida();
    // $partida->baraja = new Baraja();
    // $partida->baraja->crea_baraja();
    // $partida->baraja->mezcla();



    function mostrarCartaEnMesa (){
        global $partida;
        $partida->carta_en_mesa = array_shift($partida->baraja->conjunto_cartas);
        return $partida->carta_en_mesa->pinta_carta();
    }

    // crear una baraja para cada jugador 
    for ($i=0; $i < $_SESSION['nplayers']; $i++) { 
        // creamos un jugador y le pasamos como id la posicion en el array
        $jugador = new Jugador($i);
        $partida->array_jugadores[] = $jugador;

        for ($j=0; $j < $_SESSION['ncards']; $j++) {
            $carta = array_shift($partida->baraja->conjunto_cartas);
            $jugador->afegir_carta($carta);

        }
    }

    function mostrarJugadores() {
        global $partida;

        $playersContainer = '';
        for ($i=0; $i < $_SESSION['nplayers']; $i++) { 
            $playersContainer .= "
                <div class='d-flex flex-column gap-3 rounded border p-2'>
                    <h3 class='text-decoration-underline'>Jugador " . ($i + 1) . "</h3>
                <div class='d-flex gap-2 justify-items-center mx-auto flex-wrap'>
            ";
                
                foreach ($partida->array_jugadores[$i]->mano->conjunto_cartas as $carta) {
                    $playersContainer .= $carta->pinta_carta_link();
                }
            $playersContainer .= "
                    </div>
                </div>
            ";
        }
        return $playersContainer;
    }



    // echo '<pre>' , var_dump($partida->array_jugadores) , '</pre>';



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
    <div class="container mt-5">

       <h1 class="text-center">Juego UNO</h1>

       <div class="d-flex gap-5 mt-5">
            <?= mostrarJugadores()?>
       </div>
        <div class="rounded border p-2 mt-5">
            <!-- mostrar carta inicial baraja -->
            <p> Carta en Mesa: </p>
            <?= mostrarCartaEnMesa()?>
        </div>
    </div>
</body>
</html>