<?php
    include '../../config/config_db.php';

    $nombreBuscado = "";
    $noctaBuscado = "";
    $listaResultados = array();
    $listaAsistencias = array();
    $countAsist = 0;

    if(isset($_GET['id'])){
        //$nombreBuscado = $_GET['nombre'];
        //$noctaBuscado = $_GET['cuenta'];
        $id_alumno = $_GET["id"];

            $sql = "SELECT * FROM alumno WHERE id_alumno = $id_alumno";
        
        $resultado_query = mysqli_query($conexion,$sql);
        
        if($resultado_query){
            while ($fila = mysqli_fetch_assoc($resultado_query)){
                //$id_alumno = $fila["id_alumno"];
                $nombreAlumno = $fila["nombre"];
                $noctaAlumno = $fila["nocta"];
                $id_grupo = $fila["id_grupo"];
            }

            $sql2 = "SELECT nombre_grupo, modulo_activo FROM grupo WHERE id_grupo = $id_grupo";
            $query2 = mysqli_query($conexion,$sql2);
            if($query2){
                $fila2 = mysqli_fetch_assoc($query2);
                $grupoAlumno = $fila2 ["nombre_grupo"];
                $moduloAct = $fila2 ["modulo_activo"];
            }

            $sql3 = "SELECT id_modulo,calificacion FROM calif_mod WHERE id_alumno = $id_alumno";
            $query3 = mysqli_query($conexion,$sql3);
            if($query3){
                while($fila3 = mysqli_fetch_assoc($query3)){
                    $sql4 = "SELECT nombre_modulo FROM modulo WHERE id_modulo = ". $fila3['id_modulo'] ."";
                    $query4 = mysqli_query($conexion,$sql4);
                    $res = mysqli_fetch_assoc($query4);
                    $fila3['name_modulo'] = $res['nombre_modulo']; 
                    $listaResultados[] = $fila3;
                }
            }
            
            $sql5 = "SELECT * FROM asistencia WHERE id_alumno = $id_alumno";
            $query5 = mysqli_query($conexion,$sql5);
            if($query5){
                while($fila5 = mysqli_fetch_assoc($query5)){
                    $listaAsistencias[] = $fila5;
                }
            }
        }

        if($listaResultados){
            $promedioAlumno = 0;
            foreach ($listaResultados as $califs) {
                $promedioAlumno += $califs["calificacion"];
            }
            $promedioAlumno = number_format($promedioAlumno / count($listaResultados), 2);
        }

        if($listaAsistencias){
            foreach($listaAsistencias as $asist){
                if($asist['estatus'] == 'A' || $asist['estatus'] == 'J'){
                    $countAsist++;
                }
            }
            $countAsist/=(count($listaAsistencias)*.01);
            //var_dump($countAsist);
        }


    }

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Profesores</title>
    <link rel="stylesheet" href="../../Statics/Css/adminGraph.css">
</head>
<body>

    <?php include '../../utilities/navbarAdmin.php'; ?>

    <div class="main-layout">
        <?php include '../../utilities/sidebarAdmin.php'; ?>
    <main class="content">
    
        <div class="header-perfil">
            <div class="titulos-perfil">
                <h1>Alumno</h1>
                <?php echo "<h2>$nombreAlumno</h2>"; ?>
            </div>
            <div class="acciones-perfil">
                <button class="btn-secundario">Ver resultado de formulario</button>
                <button class="btn-secundario">Modificar</button>
                <button class="btn-peligro">Eliminar</button>
            </div>
        </div>

        <div class="grid-informacion">
        
            <div class="tarjeta-datos">
                <?php
                    echo "<p>Número de cuenta: $noctaAlumno</p>";
                    echo "<p>Grupo $grupoAlumno</p>";
                    echo "<p>Modulo activo (Módulo $moduloAct)</p>";
                    echo "<br>";
                    echo "<p>Correo electrónico institucional</p>";
                    echo "<p>Contraseña: 123Abc</p>";
                ?>
            </div>

            <div class="metricas-rapidas">
                <div class="metrica-box">
                    <div class="metrica-titulo">Asistencia total</div>
                    <?php echo "<div class='metrica-valor'>$countAsist%</div>"; ?>
                </div>
            
                <div class="metrica-box">
                    <div class="metrica-titulo">Calificación actual (ETE)</div>
                    <?php echo "<div class='metrica-valor'> $promedioAlumno </div>"; ?>
                </div>
            </div>
        </div>

        <div class="seccion-estado">
            <h2 class="titulo-estado">Estado</h2>
            <table class="tabla-modulos">
                <thead>
                    <tr>
                        <th></th>
                        <th>Asistencia</th>
                        <th>Calificación</th>
                        <th>Ánimo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                        foreach($listaResultados as $califs){
                            echo "<tr>";
                                echo "<td class='nombre-modulo'>". $califs['name_modulo'] . ":</td>";
                                echo "<td></td>";
                                echo "<td>" . $califs['calificacion'] . "</td>";
                                echo "<td></td>";
                            echo "</tr>";
                        }

                    ?>
                </tbody>
            </table>
        </div>

    </main>