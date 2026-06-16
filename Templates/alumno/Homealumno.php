<?php
session_start();
include '../../config/config_db.php'; 
$conexion = connect();
if (!isset($_SESSION['id_alumno'])) {
    header("Location: ../../index.php"); 
    exit();
}

$id_alumno_sesion = (int)$_SESSION['id_alumno'];
$sql_alumno = "SELECT nombre, id_grupo FROM alumno WHERE id_alumno = $id_alumno_sesion";
$res_alumno = mysqli_query($conexion, $sql_alumno);

if ($res_alumno && mysqli_num_rows($res_alumno) > 0) {
    $datos_alumno = mysqli_fetch_assoc($res_alumno);
    
    $nombre_alumn = $datos_alumno['nombre'];
    $id_grupo_real = (int)$datos_alumno['id_grupo'];
    
    //parasidebar
    $_SESSION['id_grupo'] = $id_grupo_real;
    $sql_grupo = "SELECT nombre_grupo FROM grupo WHERE id_grupo = $id_grupo_real";
    $res_grupo = mysqli_query($conexion, $sql_grupo);
    
    if ($res_grupo && mysqli_num_rows($res_grupo) > 0) {
        $datos_grupo = mysqli_fetch_assoc($res_grupo);
        $grupo_alumn = $datos_grupo['nombre_grupo'];
    } else {
        $grupo_alumn = "S/G";
    }
    
} else {
    $nombre_alumn = "Alumno";
    $grupo_alumn = "S/G";
}
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