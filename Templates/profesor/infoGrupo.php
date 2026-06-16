<?php
session_start();
include '../../config/config_db.php';


$id_grupo = isset($_GET['id_grupo']) ? (int)$_GET['id_grupo'] : 1; // convierte a int y si no hay se convierte en 1
$sql_grupo = "SELECT nombre_grupo,modulo_activo FROM grupo WHERE id_grupo = $id_grupo";
$res_grupo = mysqli_query($conexion, $sql_grupo);
$grupo = mysqli_fetch_assoc($res_grupo);

$indiceGrupo = 0;

$listaModulos = array();
$listaAsistencias = array();

$sql_modul = "SELECT * FROM modulo";
$query_modul = mysqli_query($conexion,$sql_modul);
if($query_modul){
    while($fila = mysqli_fetch_assoc($query_modul)){
        $listaModulos[] = $fila;
    }
}

$moduloActivoName = "";

foreach($listaModulos as $modulo){
    if($grupo['modulo_activo'] == $modulo['id_modulo']){
        $moduloActivoName = $modulo['nombre_modulo'];
        break;
    }
}


if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['moduloAct'])){

    $findModule = false;

    $moduloActivo = $_POST['moduloAct'];

    foreach($listaModulos as $modulo){
        if($moduloActivo == $modulo['id_modulo']){
            $findModule = true;
            $moduloActivoName = $modulo['nombre_modulo'];
            break;
        }
    }

    if($findModule){

        $sql_update = "UPDATE grupo SET modulo_activo = $moduloActivo WHERE id_grupo = ". $_GET['id_grupo'] ."";
        $query_update = mysqli_query($conexion,$sql_update);

    } else {
        echo "INVALID MODULE";
    }
} 
?>
<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <title>Info Grupo</title>
   <link rel="stylesheet" href="../../Statics/Css/subirRecurso.css">
</head>
<body>
   <?php include '../../utilities/navbarProfe.php'; ?>
   <div class="main-layout">
       <?php include '../../utilities/sidebarProfe.php'; ?>

       <main class="view-recursos">
           <div style="display: flex; gap: 15px; margin-bottom: 20px;">
               <h1 style="font-size: 40px; margin:0;"><?php echo htmlspecialchars($grupo['nombre_grupo']); ?></h1>
               <button class="btn-verde">Agregar alumno</button>
           </div>

           <div class="layout-info-grupo">
               <div class="columna-alumnos">
                   <?php
                   $sql_alum = "SELECT * FROM alumno WHERE id_grupo = $id_grupo";
                   $res_alum = mysqli_query($conexion, $sql_alum);
                   $countIndice = 0; 
                   
                   while ($alumno = mysqli_fetch_assoc($res_alum)){
                    
                    $califTotal = 0;
                    $countCalif = 0;
                    $countAsist = 0;
                       $id_al = $alumno['id_alumno'];
                       $sql_calif = "SELECT calificacion FROM calif_mod WHERE id_alumno = $id_al";
                       $res_calif = mysqli_query($conexion,$sql_calif);

                        $sql5 = "SELECT * FROM asistencia WHERE id_alumno = $id_al";
                        $query5 = mysqli_query($conexion,$sql5);
                        if($query5){
                            while($fila5 = mysqli_fetch_assoc($query5)){
                                $listaAsistencias[] = $fila5;
                            }
                        }
                        if($listaAsistencias != NULL){
                            foreach($listaAsistencias as $asist){
                                if($asist['estatus'] == 'A' || $asist['estatus'] == 'J'){
                                    $countAsist++;
                                }
                            }
                            $countAsist/=(count($listaAsistencias)*.01);
                            //var_dump($countAsist);
                        }

                       if($res_calif){
                            while($calif_res = mysqli_fetch_assoc($res_calif)){
                                
                                $califTotal += $calif_res['calificacion'];   
                                $countCalif ++;
                            }
                            if($countCalif > 0){
                                $califTotal/=$countCalif;
                            } else {
                                $califTotal = 'SE';
                            }
                            
                       }
                       // IMPORTANTE: Reseteamos la variable en cada vuelta para que no se herede el ciclo anterior
                       $ruta_carita = "";
                       $sql_animo = "SELECT emocion
                                    FROM estadodeanimo
                                    WHERE id_alumno = $id_al
                                    GROUP BY emocion
                                    ORDER BY COUNT(*) DESC, MAX(fecha) DESC
                                    LIMIT 1";
                        //cantidad y desempate por fecha pq me puse a jugar con escenarios de prueba y se bugeaba cuando habia empate
                       $res_animo = mysqli_query($conexion, $sql_animo);
                       
                       $ruta_carita = ""; 
                       
                       if ($res_animo && mysqli_num_rows($res_animo) > 0) {
                           $fila_animo = mysqli_fetch_assoc($res_animo);
                           $emo = strtolower($fila_animo['emocion']);
                           if ($emo == 'feliz') {
                               $ruta_carita = "../../Statics/img/emocionV.png";
                           } elseif ($emo == 'regular') {
                               $ruta_carita = "../../Statics/img/emocionA.png";
                           } elseif ($emo == 'mala') {
                               $ruta_carita = "../../Statics/img/emocionR.png";
                           }
                       }
                       if($countAsist > 0 && $califTotal != 'SE'){
                            $indiceAlumno = ($califTotal* $countAsist)/1000;
                       
                            $indiceGrupo += $indiceAlumno;
                            $countIndice++; 
                       } else {
                            $indiceAlumno = 0;
                       }
                   ?>
                       <div class="fila-alumno">
                           <span style="font-weight:bold; width: 20%;">
                               <?php echo htmlspecialchars($alumno['nombre'] . ' ' . $alumno['apell_pat_alum']); ?>
                           </span>
                           
                           <span>Calificación total:  <?php echo $califTotal ?> </span>
                           <span>Asistencia: <?php echo $countAsist; ?>%</span>
                           <span>Deserción: <?php echo $indiceAlumno; ?>%</span>
                           
                           <span style="display: flex; align-items: center; justify-content: center; width: 40px;">
                               <?php if ($ruta_carita != ""): ?>
                                   <img src="<?php echo $ruta_carita; ?>" alt="Ánimo frecuente" style="width: 25px; height: 25px;">
                               <?php else: ?>
                                   <span style="color: #999; font-size: 12px; font-weight: bold;">N/A</span>
                               <?php endif; ?>
                           </span>
                       </div>
                   <?php } ?>
               </div>

               <div class="columna-acciones">
                   <div class="circulo-desercion">
                       <?php 
                            if($countIndice > 0){
                                echo "<h2>". $indiceGrupo/$countIndice . " % </h2>";
                            } else {
                                 echo "<h2></h2>";
                            }
                             
                        ?>
                       <p>Índice de<br>deserción</p>
                   </div>
                <form action="" method="POST">
                     <select name="moduloAct" class="input-gris" style="width: 100%;" onchange= "this.form.submit()" >
                       <?php echo"<option>Modulo Actual: $moduloActivoName</option>"; ?>
                        <?php 
                            
                            if(count($listaModulos)>0)
                            {
                                foreach($listaModulos as $modulo)
                                {
                                    $id_modulo = $modulo["id_modulo"];
                                    $nombre_modulo = $modulo["nombre_modulo"];
                                    echo "<option value='$id_modulo'>$nombre_modulo</option>";
                                    
                                }
                            } 
                        ?>
                   </select>
                </form>
                  

                   <a href="listaAsistencia.php?id_grupo=<?php echo $id_grupo; ?>" class="btn-lateral">Lista de asistencia</a>
                   <a href="crearAsistencia.php?id_grupo=<?php echo $id_grupo; ?>" class="btn-lateral">Crear asistencia</a>
                   <a href="registrarCalif.php?id_grupo=<?php echo $id_grupo; ?>" class="btn-lateral">Registrar calificación</a>
               </div>
           </div>
       </main>
   </div>
</body>
</html>