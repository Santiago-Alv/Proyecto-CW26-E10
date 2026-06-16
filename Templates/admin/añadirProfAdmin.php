<?php

//session_start();


// consulta db
include '../../config/config_db.php';


// placeholder
$tipo_usu = "Administrador";
$nombre_usu = "Angela";  
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
                <h1>Profesores</h1>
            </div>

            <div class="search-container">
                <div class="search-title">
                    <span>+ Agregar Profesor</span>
                </div>
                <form action="revisarAñadirProfAdmin.php"  method="POST" class="agregar-form">
                    <input type="text" name="nombre" placeholder="Nombre del profesor" required>
                    <input type="number" name="numero_trabajador" placeholder="Número de trabajador" required>
                    <button type="submit" class="btn-agregar">Agregar</button>
                </form>
            </div>
        </main>
    </div>

</body>
</html>