<?php
    include '../../config/config_db.php';
    session_start();
    if(isset($_GET['id_grupo'])){
        //Agregar isset a toda logica pendiente
    }
    //var_dump($_SESSION['id_profesor']);
    $id_grupo = $_GET['id_grupo'];
    $modulo_activo= 2;
    $sql = "SELECT duda_text, respuesta,estado_duda, id_alumno,id_duda FROM duda WHERE id_grupo = $id_grupo";
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

    $sql3 = "SELECT nombre_grupo FROM grupo WHERE id_grupo= $id_grupo";
    $query3 = mysqli_query($conexion, $sql3); 
    $nombgrupos = array();
    $grupo;
        if($query3)
        {
            while($fila = mysqli_fetch_assoc($query3))
            {   
                $nombgrupos[]= $fila;
            }
        }
        if(count($nombgrupos)>0)
        {
            foreach($nombgrupos as $nombgrupo)
            {
                $grupo= $nombgrupo["nombre_grupo"];
            }
        }
     // placeholder
    $tipo_usu = "Profesor";
    $nombre_usu = "Angie";
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>DUDAS de alumnos</title>
        <link rel="stylesheet" href="../../Statics/Css/HistorialForoDudas.css">
        <!-- Causa problemas:
        <link rel="stylesheet" href="../../Statics/Css/profeGraph.css">
        -->
        <!-- Para barra lateral -->
        <link rel="stylesheet" href="../../Statics/Css/AdminProfe.css">
        <link rel="stylesheet" href="../../Statics/Css/adminGraph.css">
        <link rel="stylesheet" href="../../Statics/Css/subirRecurso.css">
    </head>
    <body>
        <?php include '../../utilities/navbar.php'; ?>
        <div class="main-layout">
            <?php include '../../utilities/sidebarProfe.php'; ?>
            <main id= "contenido">
                <div class="tituloHistorial">
                    <h2>Dudas de alumnos</h2>
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
                            $id_alumno = $duda_resp["id_alumno"];
                            $id_duda= $duda_resp["id_duda"];
                            
                            $sql2 = "SELECT nombre FROM alumno WHERE id_alumno= $id_alumno";
                            $query2 = mysqli_query($conexion, $sql2); 
                            $nombres = array();
                            if($query2)
                            {
                                while($fila = mysqli_fetch_assoc($query2))
                                {   
                                    $nombres[]= $fila;
                                }
                            }
                            if(count($nombres)>0)
                            {
                                foreach($nombres as $nombre)
                                {
                                    $nombre_alum= $nombre["nombre"];
                                }
                            }

                            if($estado_duda == 'R')
                                $colorestado = "contestado";
                            else
                                $colorestado = "pendiente";
                
                            echo "<table class= $colorestado >";
                            echo "<tbody>";
                                echo "<tr>" ;
                                    echo "<td class='encaduda'>
                                        <p class='paraDuda'>Duda:</p>
                                        <div class='botonduda'>
                                        <form action='ContestaDuda.php' method = 'POST'>
                                            <input type='hidden' name='idduda' value= '$id_duda'>
                                            <button type='submit' id='contestar-submit'>Contestar</button>
                                        </form>
                                        <form action='revisaEliminarDuda.php' method = 'POST'>
                                            <input type='hidden' name='idduda' value= '$id_duda'>
                                            <button type='submit' id='elimduda-submit'>Eliminar</button>
                                        </form>
                                        </div>
                                        </td>";
                                echo "</tr>";
                                echo "<tr>";
                                    echo "<td class='tituloDuda'>$duda</td>";
                                echo "</tr>";
                                echo"<tr>";
                                    echo "<td>Modulo $modulo_activo</td>";                         
                                echo "</tr>";
                                echo "<tr >";
                                    echo "<td>Alumno: $nombre_alum</td>";
                                echo "</tr>";
                                //var_dump($grupo);
                                echo "<tr >";
                                    echo "<td>Grupo:". $grupo['nombre_grupo'] ."</td>";
                                echo "</tr>";
                                echo "<tr >";
                                    echo "<td>Respuesta:</td>";
                                echo "</tr>";
                                echo "<tr>";
                                    echo "<td class = 'RespHistorialForo'>$respuesta</td>";
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
    
