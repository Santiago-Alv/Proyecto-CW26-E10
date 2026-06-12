<?php

//session_start();


// consulta db

// placeholder
$nombre_alumn = "Panchito"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <link rel="stylesheet" href="../../Statics/Css/adminGraph.css">
    <link rel="stylesheet" href="../../Statics/Css/animo.css">
        <title>Pregunta ánimo</title>
</head>
<body>
        <?php include '../../utilities/navbarAlumno.php'; ?>
        <div class="main-layout">
            <?php include '../../utilities/sidebarAlumno.php'; ?>

            <main id= "contenido">
                <div class="circulo-carita"><img src="../../Statics/img/carita.png" alt="carita"></div>

                <div class="cuadro-principal">
                    <div class="cuadro-pregunta">
                        <h2>Podría ser la fecha</h2>
                        <p>¿Cuál fué tu estado de ánimo con las clases de esta semana?
                    </div>
                    <div class="contenedor-opc">
                        <div class="opcion-carita">
                            <img src="../../Statics/img/emocionV.png" alt="Feliz">
                            <span class="texto-carita">Buena</span>
                            <input type="radio" name="animo" value="feliz">
                        </div>
                        <div class="opcion-carita">
                            <img src="../../Statics/img/emocionA.png" alt="Neutral">
                            <span class="texto-carita">Regular</span>
                            <input type="radio" name="animo" value="neutral">
                        </div>
                        <div class="opcion-carita">
                            <img src="../../Statics/img/emocionR.png" alt="Triste">
                            <span class="texto-carita">Mala</span>
                            <input type="radio" name="animo" value="triste">
                        </div>
                    
                    </div>
                    <button class="boton-enviar">enviar</button>
                </div>
            </main> 
        </div>
</body>
</html>