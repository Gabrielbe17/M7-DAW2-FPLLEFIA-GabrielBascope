<?php
session_start();
require_once('./config/config.php');

$uploadDir = 'uploads/avatares/';

$mensaje = false;
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // 
    $name = $_POST['name'];
    // $apellidos = $_POST['apellidos'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    // $picture = $_POST['picture'];

    if (isset($_FILES['picture']) && $_FILES['picture']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['picture']['tmp_name'];
        $fileName = $_FILES['picture']['name'];
    
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));


        $allowedExtension = ['jpg', 'jpeg', 'png', 'gif'];
        if (in_array($fileExtension, $allowedExtension)) {
            $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
            
            $dest_path = $uploadDir . $newFileName;
    
    
            if (!move_uploaded_file($fileTmpPath, $dest_path)) {
                die('Error: No se pudo mover el archivo a la carpeta de destino.');
            }
        }else{
            die('Error: Solo se permiten archivos de imagen (jpg, jpeg, png, gif)');
        }
    
    }else{
        die('Error: La foto no se subió correctamente.');
    }


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
    $stmt->bind_param('ssss', $name, $email, $passwordHashed, $dest_path);


    // 5. Ejecutar consulta
    if ($stmt->execute()) {
        // echo 'Usuario registrado correctamente';
        $mensaje  = 'success';
    } else {
        $mensaje = 'error';
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
        <?php if ($mensaje == "error"): ?>
            <span class="text-danger"><?php echo "Error al registrar el usuario"; ?></span>
        <?php elseif ($mensaje == "success"): ?>
            <span class="text-success"><?php echo "Usuario registrado correctamente"; ?></span>
        <?php endif; ?>

        <form action="" method="POST" class="d-flex flex-column" enctype="multipart/form-data">
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
                <input type="file" id="picture" name="picture" placeholder="URL de la imagen" accept="image/*"><br><br>
            </div>

            <input type="submit" value="Registrarse" class="btn btn-primary">
            <a href="login.php" class="text-center">o inicia sesión</a>
        </form>
    </div>
</body>

</html>