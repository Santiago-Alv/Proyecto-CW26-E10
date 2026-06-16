<?php

//session_start();


// consulta db
    include '../../config/config_db.php';
    include '../../Dynamics/contrasenia.php';
    //Insertar datos a la base de datos si no se repite
    $num_cuenta = $_GET["numc"];
    $contraseña=generarpassword(4);
    $contrasena_hasheada = hash("sha256", $contraseña);

    $sql = "UPDATE alumno SET contraseña = '$contrasena_hasheada' 
                    WHERE nocta=$num_cuenta";
    $query = mysqli_query($conexion, $sql); 

// placeholder
$tipo_usu = "Administrador";
$nombre_usu = "Angela";  
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

    <?php include '../../utilities/navbar.php'; ?>

    <div class="main-layout">
        <?php include '../../utilities/sidebarAdmin.php'; ?>

        <main class="content">
            <div class="header-content">
                <h1>Creación de alumno exitosa</h1>
            </div>
            <div class="search-container">
                <?php
                    
                    echo "<div class='search-title'>";
                        echo "<span>Sus datos son los siguientes:</span>";
                    echo "</div>";
                    echo "<form action='añadirAlumAdmin.php' class='aceptagregar-form'>";
                        echo "<p>Número de cuenta: $num_cuenta</p>";
                        echo "<p>Contraseña: $contraseña</p>";
                    
                        echo "<button type='submit' class='btn-aceptagregar'>Aceptar</button>";
                    echo "</form>";
                ?>
            </div>
        </main>
    </div>

</body>
</html>