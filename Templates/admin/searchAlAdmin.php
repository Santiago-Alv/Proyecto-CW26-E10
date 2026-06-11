<?php

//session_start();


// consulta db

// placeholder
$nombre_admin = "Angela"; 
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Alumnos</title>
    <link rel="stylesheet" href="../../Statics/Css/adminGraph.css">
</head>
<body>

    <?php include '../../utilities/navbarAdmin.php'; ?>

    <div class="main-layout">
        <?php include '../../utilities/sidebarAdmin.php'; ?>

        <main class="content">
            <div class="header-content">
                <h1>Alumnos</h1>
                <button class="btn-add">+ Añadir alumno</button>
            </div>

            <div class="search-container">
                <div class="search-title">
                    <span>🔍 Buscar alumno</span>
                </div>
                <form action="resulSearchAlum.php" method="GET" class="search-form">
                    <input type="text" name="nombre" placeholder="Nombre del alumno">
                    <input type="text" name="cuenta" placeholder="Número de cuenta">
                    <button type="submit" class="btn-search">Buscar</button>
                </form>
            </div>
        </main>
    </div>

</body>
</html>