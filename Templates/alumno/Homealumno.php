<?php

//session_start();


// consulta db

// placeholder
$nombre_alumn = "Panchito"; 
$grupo_alumn = "61D";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <link rel="stylesheet" href="../../Statics/Css/AlumGraph.css">
    <link rel="stylesheet" href="../../Statics/Css/HomeAlumno.css">
        <title>Home alumno</title>
</head>
<body>
        <?php include '../../utilities/navbarAlumno.php'; ?>
        <div class="main-layout">
            <?php include '../../utilities/sidebarAlumn.php'; ?>

            <main id= "contenido">
                <a href="ForoDudas.php" class="enlace-dudas"></a>
                
                <a href="Modulo1Alumno.php" class="enlace-modulo1"></a>
                <a href="Modulo2Alumno.php" class="enlace-modulo2"></a>
                    <div class="cuadros-contenido">
                        <div class="tarjeta">
                            <div class="tarjeta-titulo">Asistencia total</div>
                            <div class="tarjeta-valor">88%</div>
                        </div>
                        <div class="tarjeta">
                            <div class="tarjeta-titulo">Calificación actual</div>
                            <div class="tarjeta-valor">9</div>
                        </div>
                    </div>
                    <div class="contenedor-d"><!--aui va foto lista-->
                        <div class="circulo-lista">
                            <div class="c-lista"></div>
                        </div>
                        <a href="Animo.php" class="enlace-animo">
                        <div class="circulo-carita">
                            <img src="../../Statics/img/carita.png" alt="carita"></div>
                        </div>
                        </a>
                    </div>
            </main> 
        </div>
</body>
</html>