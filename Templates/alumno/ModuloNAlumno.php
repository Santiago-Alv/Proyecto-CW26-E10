<?php

session_start();


// consulta db


?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Modulo alumno</title>
        <link rel="stylesheet" href="../../Statics/Css/AlumGraph.css">
        <link rel="stylesheet" href="../../Statics/Css/ModuloAlumno.css">
    </head>
    <body>
        <?php include '../../utilities/navbarAlumno.php'; ?>
        <div class="main-layout">
            <?php include '../../utilities/sidebarAlumn.php'; ?>
        <main id= "contenido">
            <div id = "tituloModulo">
                <h1>Modulo 1 - Tu estado</h1>
            </div>
            <div class = "tablas">
                <div id = "asistencia">
                    <table>
                        <thead>
                            <td>Asistencia de modulo</td>
                        </thead>
                        <tbody>
                            <tr>
                                <td>88%</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div id = "calificacion">
                    <table>
                        <thead>
                            <td>Calificación modular</td>
                        </thead>
                        <tbody>
                            <tr>
                                <td>9</td>
                            </tr>
                    </table>
                </div>
            </div> 
        </main>   
    </body>
</html>
    
