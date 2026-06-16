<?php
    include '../../config/config_db.php';

    session_start();
    
    $nombre_alumn ="";
    $grupo_alumn ="";
    $asistencias = array();
    $countAsist =0;
    $calificaciones = array();
    $calif_tot =0;

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

        $sql = "SELECT estatus FROM asistencia WHERE id_alumno = $id_alumn";
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
        $sql1 = "SELECT calificacion FROM calif_mod WHERE id_alumno = $id_alumn";
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
                $calif_tot += $calif["calificacion"];
            }
            $calif_tot = number_format($calif_tot / count($calificaciones), 2);
        }

    }
// placeholder

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
                            <div class="tarjeta-valor"><?php echo $countAsist;?>%</div>
                        </div>
                        <div class="tarjeta">
                            <div class="tarjeta-titulo">Calificación actual</div>
                            <div class="tarjeta-valor"><?php echo $calif_tot;?></div>
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