<?php
session_start();
require_once('./config/config.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // 
    $name = $_POST['name'];
    // $apellidos = $_POST['apellidos'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $picture = $_POST['picture'];

    // 1. password cifrada
    $passwordHashed = password_hash($password, PASSWORD_DEFAULT);

    // 2. preparar consulta antes de insertar para evitar sql injection
    $stmt = $mysqli->prepare(
        "INSERT INTO USERS (name, email, password, role, dateRegister, picture) VALUES (?, ?, ?, 'user', NOW(), ?)"
    );

    // 3. Comprobar que la preparación tuvo exito
    if (!$stmt) {
        die('Error en la preparación ' . $mysqli->error);
    }

    // 4. Bindear parametros (o setear)
    $stmt->bind_param('ssss', $name, $email, $passwordHashed, $picture);


    // 5. Ejecutar consulta
    if ($stmt->execute()) {
        echo 'Usuario registrado correctamente';
    } else {
        echo 'Error al registrar el usuario';
        // 6. Cerrar la conexión
        $stmt->close();
        $mysqli->close();
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
</head>

<body class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div style="min-width: 25rem;" class="">
        <h1 class="text-center">Registro</h1>
        <form action="" method="POST" class="d-flex flex-column">
            <div class="d-flex flex-column">
                <label for="name">Nombre: </label>
                <input type="text" id="name" name="name" required><br><br>
            </div>

            <div class="d-flex flex-column">
                <label for="email">Email: </label>
                <input type="email" id="email" name="email" required><br><br>
            </div>

            <div class="d-flex flex-column">
                <label for="password">Contraseña: </label>
                <input type="password" id="password" name="password" required><br><br>
            </div>

            <div class="d-flex flex-column">
                <label for="picture">Picture: </label>
                <input type="url" id="picture" name="picture" placeholder="URL de la imagen"><br><br>
            </div>

            <input type="submit" value="Registrarse" class="btn btn-primary">
            <a href="login.php" class="text-center">o inicia sesión</a>
        </form>
    </div>
</body>

</html>