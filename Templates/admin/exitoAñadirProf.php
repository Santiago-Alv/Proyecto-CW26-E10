<?php

//session_start();


// consulta db
    include '../../config/config_db.php';

    //Insertar datos a la base de datos si no se repite
    $num_trabajador = $_GET["numt"];
    

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
                <h1>Creación de profesor exitosa</h1>
            </div>
            <div class="search-container">
                <?php
                    $contraseña = "Hola123";// $_POST["contraseña-aleatorio"]
                    echo "<div class='search-title'>";
                        echo "<span>Sus datos son los siguientes:</span>";
                    echo "</div>";
                    echo "<form action='añadirProfAdmin.php' class='aceptagregar-form'>";
                        echo "<p>Número de trabajador: $num_trabajador</p>";
                        echo "<p>Contraseña: $contraseña</p>";
                    
                        echo "<button type='submit' class='btn-aceptagregar'>Aceptar</button>";
                    echo "</form>";
                ?>
            </div>
        </main>
    </div>

</body>
</html>