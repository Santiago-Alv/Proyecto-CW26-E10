<?php
session_start();
include '../../config/config_db.php';
$conexion = connect();

$id_grupo = isset($_GET['id_grupo']) ? (int)$_GET['id_grupo'] : 1; // convierte a int y si no hay se convierte en 1
$sql_grupo = "SELECT nombre_grupo FROM grupo WHERE id_grupo = $id_grupo";
$res_grupo = mysqli_query($conexion, $sql_grupo);
$grupo = mysqli_fetch_assoc($res_grupo);
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
                <form action= 'agregAlumProfe.php' method= 'POST'> 
                    <input type='hidden' name = 'idgrupo' value = <?php echo $id_grupo;?>>
                    <button class="btn-verde">Agregar alumno</button>
                </form>
            </div>

           <div class="layout-info-grupo">
               <div class="columna-alumnos">
                   <?php
                   $sql_alum = "SELECT * FROM alumno WHERE id_grupo = $id_grupo";
                   $res_alum = mysqli_query($conexion, $sql_alum);
                   
                   while ($alumno = mysqli_fetch_assoc($res_alum)){
                       $id_al = $alumno['id_alumno'];
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
                   ?>
                       <div class="fila-alumno">
                           <span style="font-weight:bold; width: 20%;">
                               <?php echo htmlspecialchars($alumno['nombre'] . ' ' . $alumno['apell_pat_alum']); ?>
                           </span>
                           <span>MODULO1</span><span>MODULO2</span>
                           <span>Asistencia: <?php echo $alumno['asistencia']; ?>%</span>
                           <span>Deserción: --</span>
                           
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
                       <h2>80%</h2>
                       <p>Índice de<br>deserción</p>
                   </div>

                   <select class="input-gris" style="width: 100%;">
                       <option>Seleccionar módulo ↓</option>
                   </select>

                   <a href="listaAsistencia.php?id_grupo=<?php echo $id_grupo; ?>" class="btn-lateral">Lista de asistencia</a>
                   <a href="crearAsistencia.php?id_grupo=<?php echo $id_grupo; ?>" class="btn-lateral">Crear asistencia</a>
                   <a href="registrarCalif.php?id_grupo=<?php echo $id_grupo; ?>" class="btn-lateral">Registrar calificación</a>
               </div>
           </div>
       </main>
   </div>
</body>
</html>