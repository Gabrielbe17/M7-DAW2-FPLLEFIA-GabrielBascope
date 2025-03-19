<?php

    require_once './config/config.php';

    if (!isset($_GET['table'])) {
        header('Location: index.php');
        exit();
    }

    $tabla = $_GET['table'] == 'portfolio' ? 'PROJECTS' : strtoupper($_GET['table']);

    // Definir los campos para cada tabla
    $campos = [
        'USERS' => ['name', 'email', 'password', 'role', 'dateRegister', 'picture'],
        'NEWS' => ['title', 'description', 'subtitle', 'newDate'],
        'PROJECTS' => ['title', 'description', 'thumbnail', 'url'],
        'TESTIMONIALS' => ['name', 'surname', 'description', 'rating', 'image', 'date'],
        'COMMENTS' => ['description', 'userID', 'newID', 'date', 'commentID'],
        'FAQS' => ['question', 'answer', 'date']
    ];
    $cols = implode(", ", $campos[$tabla]);
    // echo $cols;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $inputs = [];
        $types = "";
        $values = [];

        // foreach ($campos[$tabla] as $campo) {
        //     if (isset($_POST[$campo])) {
        //         $inputs[] = str_contains($campo, "date") ? 'NOW()' : "?";
        //         $types .= "s"; 
        //         $values[] = $_POST[$campo];
        //     }
        // }
        foreach ($campos[$tabla] as $campo) {
            if (isset($_POST[$campo])) {
                if (strpos($campo, "date") !== false) {
                    $inputs[] = 'NOW()';
                } else {
                    $inputs[] = "?";
                    $types .= "s"; 
                    $values[] = $_POST[$campo];
                }
            }
        }
        

        $inputsPreparados = implode(", ", $inputs);
        $query = "INSERT INTO $tabla ($cols) VALUES($inputsPreparados)";
        
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param($types, ...$values);
        $stmt->execute();

        // Redirigir a panel
        header("Location: admin.php?page=" . $_GET['table']);
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir registro</title>
</head>
<body class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div style="min-width: 25rem;" class="">
        <h1 class="text-center">Añadir</h1>
        <form method="POST" class="d-flex flex-column">
            <?php foreach ($campos[$tabla] as $campo): ?>
                <div class="d-flex flex-column">
                    <label for="<?php echo $campo; ?>"><?php echo ucfirst($campo); ?>:</label>
                    <input type="text" id="<?php echo $campo; ?>" name="<?php echo $campo; ?>" value="<?php echo ($array[$campo]); ?>">
                </div>
            <?php endforeach; ?>
            <input type="submit" value="Añadir" class="btn btn-primary mt-3">
        </form>
    </div>
</body>
</html>