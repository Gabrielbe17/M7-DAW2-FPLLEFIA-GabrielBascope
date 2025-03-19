<?php
    require_once './config/config.php';

    if (!isset($_GET['id']) || !isset($_GET['table'])) {
        header('Location: index.php');
        exit();
    }

    $tabla = $_GET['table'] == 'portfolio' ? 'PROJECTS' : strtoupper($_GET['table']);
    $id = (int) $_GET['id'];


    $result = $mysqli->query("SELECT * FROM $tabla WHERE id = $id");
    $array = $result->fetch_assoc();

    // print_r($array);
    // print("<pre>".print_r($array,true)."</pre>");

    // Definir los campos para cada tabla
    $campos = [
        'USERS' => ['name', 'email', 'password', 'role', 'dateRegister', 'picture'],
        'NEWS' => ['title', 'description', 'subtitle', 'newDate'],
        'PROJECTS' => ['title', 'description', 'thumbnail', 'url'],
        'TESTIMONIALS' => ['name', 'surname', 'description', 'rating', 'image', 'date'],
        'COMMENTS' => ['description', 'userID', 'newID', 'date', 'commentID'],
        'FAQS' => ['question', 'answer', 'date']
    ];

    $errores = [];
    function validarCampo($campo, $valor){
        global $errores;
        
        switch ($campo) {
            case 'email':
                if (!filter_var($valor, FILTER_VALIDATE_EMAIL)) {
                    $errores[$campo] = "El email no es válido";
                }
                break;
    
            case 'rating':
                $valorInt = (int) $valor;
                if (!is_numeric($valorInt) || $valorInt < 1 || $valorInt > 5) {
                    $errores[$campo] = "La puntuación debe ser un número entre 1 y 5";
                }
                break;
            default:
                if (empty($valor)) {
                    $errores[$campo] = "Este campo es obligatorio";
                }
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $updateFields = [];
        $types = "";
        $values = [];

        foreach ($campos[$tabla] as $campo) {
            if (isset($_POST[$campo])) {
                validarCampo($campo, $_POST[$campo]);

                $updateFields[] = "$campo = ?";
                $types .= "s"; 
                $values[] = $_POST[$campo];
            }
        }

        $values[] = $id;
        $types .= "i"; // Para el ID

        if (empty($errores)) {
            $query = "UPDATE $tabla SET " . implode(", ", $updateFields) . " WHERE id = ?";
            $stmt = $mysqli->prepare($query);
            $stmt->bind_param($types, ...$values);
            $stmt->execute();
    
            // Redirigir a panel
            header("Location: admin.php?page=" . $_GET['table']);
            exit();
        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
    <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
</head>
<body class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div style="min-width: 25rem;" class="">
        <h1 class="text-center">Edita</h1>
        <form method="POST" class="d-flex flex-column">
            <?php foreach ($campos[$tabla] as $campo): ?>
                <div class="d-flex flex-column">
                    <label for="<?php echo $campo; ?>"><?php echo ucfirst($campo); ?>:</label>
                    <input type="text" id="<?php echo $campo; ?>" name="<?php echo $campo; ?>" value="<?php echo ($array[$campo]); ?>">

                    <?php if (isset($errores[$campo])): ?>
                        <span class="text-danger"><?php echo $errores[$campo]; ?></span>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
            <input type="submit" value="Actualizar" class="btn btn-primary mt-3">
        </form>
    </div>
</body>
</html>