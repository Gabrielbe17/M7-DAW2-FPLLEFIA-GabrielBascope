<?php
    require_once '../config/config.php';

    if (!isset($_GET['id'])) {
        header('Location: index.php');
        exit();
    }

    $id = (int) $_GET['id'];

?>