<?php
    session_start();
    include '../../config/config_db.php';
    $id_grupo = 0;
    $modulo_activo = array();
    $dudas_resps = array();
    $nombgrupos = array();
    $grupo = "";
    $modact = "";
    if(isset($_GET['id_grupo'])){
        //Agregar isset a toda logica pendiente
        $id_grupo = $_GET['id_grupo'];
    }
    //var_dump($_SESSION['id_profesor']);
    if (isset($_SESSION['usuario']) && $_SESSION['usuario'] == 'profesor') 
    {   
        
        $sql = "SELECT duda_text, respuesta,estado_duda, id_alumno,id_duda FROM duda WHERE id_grupo = $id_grupo";
        $query = mysqli_query($conexion, $sql); 
        if($query)
        {
            while($fila = mysqli_fetch_assoc($query))
            {   
                $dudas_resps[]= $fila;
                //var_dump($fila);
            }
        }

        $sql1 = "SELECT modulo_activo,nombre_grupo FROM grupo WHERE id_grupo = $id_grupo";
        $query1 = mysqli_query($conexion, $sql1); 
        if($query1){
            while($fila = mysqli_fetch_assoc($query1)){
                $nombgrupos["nombre_grupo"]= $fila['nombre_grupo'];
                $modulo_activo ["modulo_activo"] = $fila['modulo_activo'];
            }
        }

        if(count($nombgrupos)>0)
        {
            
            foreach($nombgrupos as $nombgrupo)
            {
                
                $grupo = $nombgrupo;
            }
        }
        if(count($modulo_activo)>0)
        {
            foreach($modulo_activo as $modacts)
            {
                $modact = $modacts;
            }
        }
    }else {
        header("Location: ../../index.php");
    }

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
   
        <link rel="stylesheet" href="../../Statics/Css/adminGraph.css">
        <link rel="stylesheet" href="../../Statics/Css/subirRecurso.css">
    </head>
    <body>
        <?php include '../../utilities/navbarProfe.php'; ?>
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
                                    echo "<td>Modulo $modact</td>";                         
                                echo "</tr>";
                                echo "<tr >";
                                    echo "<td>Alumno: $nombre_alum</td>";
                                echo "</tr>";
                                //var_dump($grupo);
                                echo "<tr >";
                                    echo "<td>Grupo:$grupo</td>";
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
    
