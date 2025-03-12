<?php
    session_start();
    require_once('./config/config.php');

    if ($_SESSION['user_role'] !== 'admin') {
        header('Location: index.php');
        exit();
    }

    function mostrarVista() {
        global $mysqli;
        if (isset($_GET['page'])) {
            $selectedPage = $_GET['page'];

            // Encabezado común
            $header = '<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                            <h1 class="h2">' . obtenerTitulo($selectedPage) . '</h1>
                            <button type="button" class="btn btn-success">
                                <i class="bi bi-plus-circle"></i> Añadir
                            </button>
                    </div>';

            // Contenido de la tabla según el caso
            switch ($selectedPage) {
                case 'users':
                    $columnas = ['#', 'Nombre', 'Email', 'Contraseña', 'Rol', 'Fecha', 'Imagen', 'Acciones'];

                    $result = $mysqli->query("SELECT * FROM USERS");
                    $filas = $result->fetch_all(MYSQLI_ASSOC);

                    break;

                case 'news':
                    $columnas = ['#', 'Título', 'Descripción', 'Subtitulo', 'Fecha', 'Acciones'];
                    $result = $mysqli->query("SELECT * FROM NEWS");
                    $filas = $result->fetch_all(MYSQLI_ASSOC);

                    break;

                case 'portfolio':
                    $columnas = ['#', 'Título', 'Descripción', 'Miniatura', 'URL', 'Acciones'];
                    $result = $mysqli->query("SELECT * FROM PROJECTS");
                    $filas = $result->fetch_all(MYSQLI_ASSOC);
                    break;

                case 'testimonials':
                    $columnas = ['#', ' Nombre', 'Apellidos', 'Descripción', 'Puntuación', 'Imagen', 'Fecha', 'Acciones'];
                    $result = $mysqli->query("SELECT * FROM TESTIMONIALS");
                    $filas = $result->fetch_all(MYSQLI_ASSOC);
                    break;

                case 'comments':
                    $columnas = ['#', 'Comentario', 'ID Usuario', 'ID Notícia', 'Fecha', 'CommentID', 'Acciones'];
                    $result = $mysqli->query("SELECT * FROM COMMENTS");
                    $filas = $result->fetch_all(MYSQLI_ASSOC);
                    break;

                case 'faqs':
                    $columnas = ['#', 'Pregunta Frecuente', 'Respuesta Breve', 'Fecha', 'Acciones'];
                    $result = $mysqli->query("SELECT * FROM FAQS");
                    $filas = $result->fetch_all(MYSQLI_ASSOC);
                    break;

                default:
                    echo '<h2>Bienvenido al Panel de Administración</h2>';
                    echo '<p>Seleccione una opción del menú para comenzar.</p>';
                    return;
            }

            // Generar tabla
            echo $header;
            echo '<div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>';

            foreach ($columnas as $columna) {
                echo "<th scope='col'>{$columna}</th>";
            }

            echo '</tr>
                </thead>
                <tbody>';

            foreach ($filas as $fila) {
                echo '<tr>';

                foreach ($fila as $dato) {
                    echo "<td>{$dato}</td>";
                }

                echo '<td class="d-flex align-items-center gap-2 flex-wrap">
                        <button type="button" class="btn btn-primary btn-sm">
                            <i class="bi bi-pencil"></i>
                        </button>
                        <button type="button" class="btn btn-danger btn-sm">
                            <i class="bi bi-trash"></i>
                        </button>
                    </td>';

                echo '</tr>';
            }

            echo '</tbody>
                </table>
            </div>';
        } else {
            echo '<h2>Bienvenido al Panel de Administración</h2>';
            echo '<p>Seleccione una opción del menú para comenzar.</p>';
        }
    }

    // Función para obtener el título dinámico según la página seleccionada
    function obtenerTitulo($page) {
        $titulos = [
            "users" => "Usuarios",
            "news" => "Noticias",
            "portfolio" => "Portafolio",
            "testimonials" => "Testimonios",
            "comments" => "Comentarios",
            "faqs" => "FAQs"
        ];

        return isset($titulos[$page]) ? $titulos[$page] : "Panel";
    }


?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

    <style>
        body {
            font-size: .875rem;
        }

        .feather {
            width: 16px;
            height: 16px;
        }
        #sidebarMenu{
            max-width: 15rem !important;
        }
        .sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 100;
            padding: 48px 0 0;
            box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
        }

        @media (max-width: 767.98px) {
            .sidebar {
                top: 5rem;
            }
        }

        .sidebar-sticky {
            height: calc(100vh - 48px);
            overflow-x: hidden;
            overflow-y: auto;
        }

        .sidebar .nav-link {
            font-weight: 500;
            color: #333;
        }

        .sidebar .nav-link .feather {
            margin-right: 4px;
            color: #727272;
        }

        .sidebar .nav-link.active {
            color: #2470dc;
        }

        .sidebar .nav-link:hover .feather,
        .sidebar .nav-link.active .feather {
            color: inherit;
        }

        .navbar-brand {
            padding-top: .75rem;
            padding-bottom: .75rem;
            background-color: rgba(0, 0, 0, .25);
            box-shadow: inset -1px 0 0 rgba(0, 0, 0, .25);
        }

        .navbar .navbar-toggler {
            top: .25rem;
            right: 1rem;
        }

        .navbar .form-control {
            padding: .75rem 1rem;
        }

        .form-control-dark {
            color: #fff;
            background-color: rgba(255, 255, 255, .1);
            border-color: rgba(255, 255, 255, .1);
        }

        .form-control-dark:focus {
            border-color: transparent;
            box-shadow: 0 0 0 3px rgba(255, 255, 255, .25);
        }
    </style>
</head>

<body>
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Admin Panel</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-nav">
            <div class="nav-item ">
                <a class="nav-link px-3" href="logout.php">Cerrar sesión</a>
            </div>
            <div class="nav-item ">
                <a class="nav-link px-3" href="index.php">Volver a home</a>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column mt-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="?page=users">
                                <span data-feather="users"></span>
                                Usuarios
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?page=news">
                                <span data-feather="file-text"></span>
                                Notícias
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?page=portfolio">
                                <span data-feather="briefcase"></span>
                                Portfolio
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?page=testimonials">
                                <span data-feather="star"></span>
                                Testimonios
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?page=comments">
                                <span data-feather="message-square"></span>
                                Comentarios
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?page=faqs">
                                <span data-feather="help-circle"></span>
                                FAQ'S
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <?php mostrarVista()?>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>
    <script>
        feather.replace();
    </script>
</body>

</html>