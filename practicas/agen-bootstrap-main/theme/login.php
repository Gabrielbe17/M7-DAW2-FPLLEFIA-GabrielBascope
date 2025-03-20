<?php
session_start();
require_once('./config/config.php');

// 1. Comprobar si el formulario ha sido enviado

$error = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // 2. Guardamos datos del formulario en variables 

    $email = $_POST["email"];
    $password = $_POST["password"];

    //3. Ejecutar la consulta
    $result = $mysqli->query("SELECT * FROM USERS WHERE email = '$email' LIMIT 1");

    // 4. Comprobar si hay resultados
    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // 5. Comprobar si la contraseña es correcta. Desencriptar y comparar. con el metodo password_verify
        if (password_verify($password, $user['password']) || $password == $user['password']) {
            // 6. Iniciar sesión
            $_SESSION['user_id']  = $user['id'];
            $_SESSION['user_name']  = $user['name'];
            $_SESSION['user_email']  = $user['email'];
            $_SESSION['user_role']  = $user['role'];
            $_SESSION['user_picture']  = $user['picture'];

            header('Location: index.php');
            exit();
        } else {
            $error = "Contraseña incorrecta";
        }

        // header('Location: index.php');
    } else {
        $error = "Usuario no encontrado";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
</head>

<body class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div>
        <h1>Inicia Sesión</h1>
        <?php if (($error)): ?>
            <span class="text-danger"><?php echo $error; ?></span>
        <?php endif; ?>
        <form action="" method="POST" class="d-flex flex-column">

            <div class="d-flex flex-column">
                <label for="email">Email: </label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="d-flex flex-column mb-3">
                <label for="password">Contraseña: </label>
                <input type="password" id="password" name="password" required>
            </div>

            <input type="submit" value="Iniciar Sesión" class="btn btn-primary">
            <a href="register.php" class="text-center">o regístrate</a>
        </form>
    </div>
</body>

</html>