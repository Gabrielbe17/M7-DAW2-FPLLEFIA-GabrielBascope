<?php
    session_start();
    require_once('./config/config.php');

    if (isset($_GET['table']) && isset($_GET['id'])) {
        $tabla = $_GET['table'] == 'portfolio' ? 'PROJECTS' : strtoupper($_GET['table']);
        $id = $_GET['id'];

        $stmt = $mysqli->prepare("DELETE FROM $tabla WHERE id = ?");

        if (!$stmt) {
            die('Error en la preparación ' . $mysqli->error);
        }

        $stmt->bind_param("i", $id);
        
        if ($stmt->execute()) {
            // echo 'Eliminado correctamente';
            header('Location: admin.php?page=' . $_GET['table']);
            exit();
        } else {
            echo 'Error al registrar el usuario';
            $stmt->close();
            $mysqli->close();
        }


    }

?>