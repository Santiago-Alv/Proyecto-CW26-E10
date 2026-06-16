<?php
session_start();
include '../../config/config_db.php';




?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Profesores</title>
    <link rel="stylesheet" href="../../Statics/Css/adminGraph.css">
</head>
<body>

    <?php include '../../utilities/navbar.php'; ?>

    <div class="main-layout">
        <?php include '../../utilities/sidebarAdmin.php'; ?>

        <main class="content">
            <div class="header-content">
                <h1>Grupos</h1>
                <a href="./añadirGrupo.php"><button class="btn-add">+ Añadir grupo</button></a>
            </div>

            <div class="search-container">
                <div class="search-title">
                    <span>🔍 Buscar Grupos</span>
                </div>
                <form action="resulSearchPrf.php" method="GET" class="search-form">
                    <input type="text" name="nombre" placeholder="Nombre del Grupo">
    


                    <button type="submit" class="btn-search">Buscar</button>
                </form>
            </div>
        </main>
    </div>

</body>
</html>