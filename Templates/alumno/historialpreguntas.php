<?php
    include '../../config/config_db.php';
    session_start();
    $modulo_activo = 3;
    $id_alumno= $_SESSION['id_alumno'];

    $sql = "SELECT duda_text, respuesta,estado_duda FROM duda WHERE id_alumno = $id_alumno";
    $query = mysqli_query($conexion, $sql); 
    $dudas_resps = array();
    if($query)
    {
        while($fila = mysqli_fetch_assoc($query))
        {   
            $dudas_resps[]= $fila;
            //var_dump($fila);
        }
    }


?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Historial de foro de dudas de alumno</title>
        <link rel="stylesheet" href="../../Statics/Css/HistorialForoDudas.css">
        <link rel="stylesheet" href="../../Statics/Css/AlumGraph.css">
    </head>
    <body>
        <?php include '../../utilities/navbarAlumno.php'; ?>
        <div class="main-layout">
            <?php include '../../utilities/sidebarAlumn.php'; ?>
            <main id= "contenido">
                <div class="tituloHistorial">
                    <h2>Historial de tus dudas y respuestas</h2>
                </div> 
                <div class="HistPregunta">
                <?php
                    if(count($dudas_resps)>0)
                    {
                        foreach($dudas_resps as $duda_resp)
                        {
                            $duda= $duda_resp["duda_text"];
                            $respuesta = $duda_resp["respuesta"];
                            $estado_duda = $duda_resp["estado_duda"];

                            if($estado_duda == 'R')
                                $colorestado = "contestado";
                            else
                                $colorestado = "pendiente";

                            echo "<table class= $colorestado >";
                            echo "<tbody>";
                                echo "<tr class='tituloDuda'>";
                                    echo "<td>Duda: $duda</td>";
                                echo "</tr>";
                                echo"<tr class = 'moduloDuda'>";
                                    echo "<td>Modulo $modulo_activo</td>";                         
                                echo "</tr>";
                                echo "<tr class= 'RespDuda'>";
                                    echo "<td>Respuesta:</td>";
                                echo "</tr>";
                                echo "<tr class = 'RespHistorialForo'>";
                                    echo "<td>$respuesta</td>";
                                echo "</tr>";
                                echo "</tbody>";
                            echo "</table>";
                        }
                    }
                ?>
                </div>
            </main> 
        </div>  
    </body>
</html>
    
