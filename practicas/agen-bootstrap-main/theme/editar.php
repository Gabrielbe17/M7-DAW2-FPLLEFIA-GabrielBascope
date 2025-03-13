<?php
    require_once './config/config.php';

    if (!isset($_GET['id']) || !isset($_GET['table'])) {
        header('Location: index.php');
        exit();
    }

    $tabla = strtoupper($_GET['table']);
    $id = (int) $_GET['id'];

    $result = $mysqli->query("SELECT * FROM $tabla WHERE id = $id");
    $array = $result->fetch_assoc();

    // print_r($array);
    print("<pre>".print_r($array,true)."</pre>");

    // Definir los campos para cada tabla
    $campos = [
        'USERS' => ['name', 'email', 'password', 'role', 'dateRegister', 'picture'],
        'NEWS' => ['title', 'description', 'subtitle', 'newDate'],
        'PROJECTS' => ['title', 'description', 'thumbnail', 'url'],
        'TESTIMONIALS' => ['name', 'surname', 'description', 'rating', 'image', 'date'],
        'COMMENTS' => ['description', 'userID', 'newID', 'date', 'commentID'],
        'FAQS' => ['question', 'answer', 'date']
    ];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $updateFields = [];
        $types = "";
        $values = [];

        foreach ($campos[$tabla] as $campo) {
            if (isset($_POST[$campo])) {
                $updateFields[] = "$campo = ?";
                $types .= "s"; 
                $values[] = $_POST[$campo];
            }
        }

        $values[] = $id;
        $types .= "i"; // Para el ID

        $query = "UPDATE $tabla SET " . implode(", ", $updateFields) . " WHERE id = ?";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param($types, ...$values);
        $stmt->execute();

        // Redirigir a panel
        header("Location: admin.php");
        exit();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>
<body>
    <form method="POST">
        <?php foreach ($campos[$tabla] as $campo): ?>
            <label for="<?php echo $campo; ?>"><?php echo ucfirst($campo); ?>:</label>
            <input type="text" id="<?php echo $campo; ?>" name="<?php echo $campo; ?>" 
                value="<?php echo htmlspecialchars($array[$campo] ?? ''); ?>"><br>
        <?php endforeach; ?>
        <input type="submit" value="Actualizar">
    </form>
</body>
</html>