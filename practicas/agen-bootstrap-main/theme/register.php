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

        // 2. eparar consulta antes de insertar para evitar sql injection
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
        }else{
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
</head>
<body>
    <h1>Registro</h1>
    <form action="" method="POST">
        <label for="name">Nombre: </label>
        <input type="text" id="name" name="name" required><br><br>
<!--         
        <label for="apellidos">Apellidos: </label>
        <input type="text" id="apellidos" name="apellidos" required><br><br>
         -->
        <label for="email">Email: </label>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="password">Contraseña: </label>
        <input type="password" id="password" name="password" required><br><br>
        
        <label for="picture">Picture: </label>
        <input type="url" id="picture" name="picture" placeholder="URL de la imagen"><br><br>
        
        <input type="submit" value="Registrarse">
    </form>
</body>
</html>
