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

    <!-- IMPORTANTE: AÑADIR ESTA CLASE PARA QUE FUNCIONE EL HEADER-->
    <link rel="stylesheet" href="../../Statics/Css/adminGraph.css">
</head>
<body>

    <?php include '../../utilities/navbarAdmin.php'; ?>

    <div class="main-layout">
        <?php include '../../utilities/sidebarAdmin.php'; ?>

        <main class="content">
        <!-- Aca va su contenido  (main)-->
        </main>
    </div>

</body>
</html>