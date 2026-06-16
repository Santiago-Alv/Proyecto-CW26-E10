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
            <div class="search-container">
                <?php

                        echo "<div class='avisa-repeticion'>";
                            echo "<label for='aviso' id= 'aviso-repetprofe'>Ya existe un profesor con ese<br>número de trabajador</label>";
                            echo "<div class='botones-aceprepeticion'>";
                                echo "<form action='añadirProfAdmin.php'>";
                                    echo "<button type='submit' id='repetido-submit'>Ok</button>";
                                echo "</form>";
                            echo "</div>";
                        echo"</div> ";
                ?>
            </div>
        </main>
    </div>

</body>
</html>