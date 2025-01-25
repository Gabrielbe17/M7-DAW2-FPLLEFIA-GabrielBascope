<?php
    session_start();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $_SESSION['nplayers'] = $_POST['njugadores'];
        $_SESSION['ncards'] = $_POST['ncartas'];

        header('Location: juego.php');
        exit();
    }

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UNO</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/styles.css">
    <style>
  
    </style>
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">
    <div class="video-background">
        <video autoplay loop muted class="w-100 h-100 object-fit-cover">
            <source src="./images/cartas_uno/video_fondo_uno.mp4" type="video/mp4">
        </video>
    </div>
    <div class="overlay"></div>
    <div class="container content mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header bg-dark text-white">
                        <h2 class="text-center mb-0">Juega al UNO</h2>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="mb-3">
                                <label for="njugadores" class="form-label">Número de Jugadores:</label>
                                <input type="number" class="form-control" id="njugadores" name="njugadores" min="1" max="5" required>
                            </div>
                            <div class="mb-3">
                                <label for="ncartas" class="form-label">Número de Cartas por Jugador:</label>
                                <input type="number" class="form-control" id="ncartas" name="ncartas" min="1" max="7" required>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-dark btn-lg">Iniciar Juego</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
