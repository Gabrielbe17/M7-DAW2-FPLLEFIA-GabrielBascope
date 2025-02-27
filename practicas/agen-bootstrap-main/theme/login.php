<?php
    session_start();
    require_once('./config/config.php');

    // 1. Comprobar si el formulario ha sido enviado


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
            }else{
                echo "Contraseña incorrecta";
            }

            // header('Location: index.php');
        }else{
            echo "Usuario no encontrado";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
</head>
<body>
    <h1>Inicio de Sesión</h1>
    <form action="" method="POST">

        <label for="email">Email: </label>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="password">Contraseña: </label>
        <input type="password" id="password" name="password" required><br><br>
        
        
        <input type="submit" value="Iniciar Sesión">
    </form>
</body>
</html>
