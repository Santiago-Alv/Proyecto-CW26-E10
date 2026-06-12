<?php

//session_start();


// consulta db

// placeholder
$nombre_alumn = "Panchito";
$grupo_alumn = "61D"; 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de foro de dudas de alumno</title>
    <link rel="stylesheet" href="../../Statics/Css/AlumGraph.css">
    <link rel="stylesheet" href="../../Statics/Css/HistorialForoDudas.css">
</head>
<body>
        <?php include '../../utilities/navbarAlumno.php'; ?>
        <div class="main-layout">
            <?php include '../../utilities/sidebarAlumno.php'; ?>

        <main id= "contenido">
            <div class="tituloHistorial">
                <h2>Historial de tus dudas y respuestas</h2>
            </div> 
            <div class="HistPregunta">
                <table>
                    <tbody>
                        <tr class="tituloDuda">
                            <td>Pregunta o duda</td>
                        </tr>
                        <tr class = "moduloDuda">
                            <td>Modulo 1</td>                            </tr>
                        <tr class= "RespDuda">
                            <td>Respuesta:</td>
                        </tr>
                        <tr class = "RespHistorialForo">
                            <td> Sin repuesta</td>
                        </tr>
                    </tbody>
                </table>
                <table>
                    <tbody>
                        <tr class="tituloDuda">
                            <td>Pregunta o duda</td>
                        </tr>
                        <tr class = "moduloDuda">
                            <td>Modulo 1</td>                            </tr>
                        <tr class= "RespDuda">
                            <td>Respuesta:</td>
                        </tr>
                        <tr class = "RespHistorialForo">
                            <td> Sin repuesta</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>   
    </body>
</html>
    