<?php

//session_start();


// consulta db
include '../../config/config_db.php';

session_start();
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
            <div class="search-container">
                <?php

                        echo "<div class='avisa-repeticion'>";
                            echo "<label for='aviso' id= 'aviso-repetalumno'>Ya existe un alumno con ese<br>número de cuenta</label>";
                            echo "<div class='botones-aceprepeticion'>";
                                echo "<form action='añadirAlumAdmin.php'>";
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