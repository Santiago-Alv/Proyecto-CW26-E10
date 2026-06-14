<?php
     // placeholder
    $tipo_usu = "Alumno";
    $nombre_usu = "Juanito Juanito";
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Historial de foro de dudas de alumno</title>
        <link rel="stylesheet" href="../../Statics/Css/HistorialForoDudas.css">
        <link rel="stylesheet" href="../../Statics/Css/alumGraph.css">
    </head>
    <body>
        <?php include '../../utilities/navbar.php'; ?>
        <div class="main-layout">
            <?php include '../../utilities/sidebarAlumn.php'; ?>
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
                                <td>Modulo 1</td>                            
                            </tr>
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
        </div>  
    </body>
</html>
    
