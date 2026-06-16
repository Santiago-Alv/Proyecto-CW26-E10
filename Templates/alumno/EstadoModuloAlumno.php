<?php
    include '../../config/config_db.php';

    session_start();

    $num_modulo = 0;
    $nombre_alumn ="";
    $grupo_alumn ="";
    $asistencias = array();
    $countAsist =0;
    $calificaciones = array();
    $calif_mod =0;

    if(isset($_GET['numMod'])){
        //Agregar isset a toda logica pendiente
        $num_modulo = $_GET['numMod'];
    }
    //var_dump($_SESSION);
    if (isset($_SESSION['usuario']) && $_SESSION['usuario'] == 'alumno') 
    {  
        if (isset($_SESSION['id_alumno']) && isset($_SESSION['nombre']) && isset($_SESSION['grupo']))
        $id_alumn= $_SESSION['id_alumno'];
        $nombre_alumn= $_SESSION['nombre'];
        $grupo_alumn= $_SESSION['grupo'];

        $sql = "SELECT estatus FROM asistencia WHERE id_alumno = $id_alumn AND id_modulo = $num_modulo";
        $query = mysqli_query($conexion, $sql); 
        if($query)
        {
            while($fila = mysqli_fetch_assoc($query))
            {   
                $asistencias[]= $fila;
            }
        }
        if($asistencias){
            foreach($asistencias as $asist){
                if($asist['estatus'] == 'A' || $asist['estatus'] == 'J'){
                    $countAsist++;
                }
            }
            $countAsist/=(count($asistencias)*.01);
            //var_dump($countAsist);
        }
        $sql1 = "SELECT calificacion FROM calif_mod WHERE id_alumno = $id_alumn AND id_modulo = $num_modulo";
        $query1 = mysqli_query($conexion, $sql1); 
        if($query1)
        {
            while($fila = mysqli_fetch_assoc($query1))
            {   
                $calificaciones[]= $fila;
            }
        }
        if($calificaciones){
            foreach ($calificaciones as $calif) {
                $calif_mod += $calif["calificacion"];
            }
            $calif_mod = number_format($calif_mod / count($calificaciones), 2);
        }

    }
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Modulo alumno</title>
        <link rel="stylesheet" href="../../Statics/Css/ModuloAlumno.css">
        <link rel="stylesheet" href="../../Statics/Css/AlumGraph.css">
    </head>
    <body>
        <?php include '../../utilities/navbarAlumno.php'; ?>
        <div class="main-layout">
            <?php include '../../utilities/sidebarAlumn.php'; ?>
            <main id= "contenido">
                <div id = "tituloModulo">
                    <h1 id = "NumMod" >Modulo <?php echo $num_modulo?> - Tu estado</h1>
                </div>
                <div class = "tablas">
                    <div id = "asistencia">
                        <table>
                            <thead>
                                <td>Asistencia de modulo</td>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $countAsist;?>%</td>
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
                                    <td><?php echo $calif_mod;?></td>
                                </tr>
                        </table>
                    </div>
                </div> 
            </main> 
        </div>  
    </body>
</html>
    
