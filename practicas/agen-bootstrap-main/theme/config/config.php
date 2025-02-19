<?php
    // Configuración conexión a base de datos
    $host = 'mysql-gabriel17.alwaysdata.net';
    $dbname = 'gabriel17_uf3crud';
    $username = 'gabriel17';
    $password = '';


    $mysqli = new mysqli($host, $username, $password, $dbname);

    if ($mysqli->connect_error) {
        die("Error de conexión: ". $mysqli->connect_error);
    }else{
        echo "CONEXIÓN EXISTOSA";
    }
?>