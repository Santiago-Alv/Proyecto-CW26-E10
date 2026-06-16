<?php

session_start();
include '../../config/config_db.php';
$conexion = connect();


$id_grupo = isset($_GET['id_grupo']) ? (int)$_GET['id_grupo'] : 1;
$fecha_url = isset($_GET['fecha']) ? $_GET['fecha'] : date('Y-m-d');//fecha de hoy si no


$sql_grupo = "SELECT modulo_activo, nombre_grupo FROM grupo WHERE id_grupo = $id_grupo";
$fila_grupo = mysqli_fetch_assoc(mysqli_query($conexion, $sql_grupo));
$id_modulo_activo = $fila_grupo['modulo_activo'];
$nombre_grupo = $fila_grupo['nombre_grupo'];


// Procesar formulario de actualización
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btn_actualizar'])) {
   $id_alumno = (int)$_POST['id_alumno'];//convertir a int
   //sanitizar y eso
   $fecha = mysqli_real_escape_string($conexion, $_POST['fecha']);
   $estatus = mysqli_real_escape_string($conexion, $_POST['estatus']);


   // ver si ya existe asistencia ese dia
   $res_check = mysqli_query($conexion, "SELECT id_asistencia FROM asistencia WHERE id_alumno = $id_alumno AND fecha = '$fecha'");


   if (mysqli_num_rows($res_check) > 0) {
       // si existe solo actualizar
       mysqli_query($conexion, "UPDATE asistencia SET estatus = '$estatus' WHERE id_alumno = $id_alumno AND fecha = '$fecha'");
   } else {
       // si no existe crear registro nuevo
       mysqli_query($conexion, "INSERT INTO asistencia (id_alumno, id_modulo, estatus, fecha) VALUES ($id_alumno, $id_modulo_activo, '$estatus', '$fecha')");
   }


   // volver a abrir la misma fecha
   header("Location: listaAsistencia.php?id_grupo=$id_grupo&fecha=$fecha");
   exit();
}


// fechas que tienen asistencia de este grupo
$sql_fechas = "SELECT DISTINCT fecha FROM asistencia WHERE id_alumno IN (SELECT id_alumno FROM alumno WHERE id_grupo = $id_grupo) ORDER BY fecha DESC";
                //sin duplicados                                      //solo aparezcan alms de ese grupo                           //nuevo a viejo
$res_fechas = mysqli_query($conexion, $sql_fechas);


$lista_fechas = [];


while ($fila = mysqli_fetch_assoc($res_fechas)) {
   $lista_fechas[] = $fila['fecha'];
}


// por si es una fecha nueva y aun no sale en la consulta
if (!in_array($fecha_url, $lista_fechas) && !empty($fecha_url)) {
   $lista_fechas[] = $fecha_url;//forzar a q de ahuevo este en el array
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <title>Lista Asistencia</title>
   <link rel="stylesheet" href="../../Statics/Css/subirRecurso.css">
</head>
<body>
   <?php include '../../utilities/navbarProfe.php'; ?>
   <div class="main-layout">
       <?php include '../../utilities/sidebarProfe.php'; ?>
      
       <main class="view-recursos">
           <h1><?php echo htmlspecialchars($nombre_grupo); ?> ASISTENCIA</h1>


           <?php if (count($lista_fechas) > 0): ?>
               <?php foreach ($lista_fechas as $fecha):
                   $estado_open = ($fecha == $fecha_url) ? "open" : "";//si es hoy se abre default
               ?>
                   <details class="acordeon-fecha" <?php echo $estado_open; ?>>
                       <summary>📅 <?php echo date("d-m-Y", strtotime($fecha)); //cambia formato de fecha?></summary>
                      
                       <div class="contenido-fecha">
                           <?php
                           $res_alumnos = mysqli_query($conexion, "SELECT id_alumno, nombre FROM alumno WHERE id_grupo = $id_grupo");//alumnos de este grrr


                           if (mysqli_num_rows($res_alumnos) > 0):
                               while ($alumno = mysqli_fetch_assoc($res_alumnos)):
                                   $id_al = $alumno['id_alumno'];
          
                                   $res_asistencia = mysqli_query($conexion, "SELECT estatus FROM asistencia WHERE id_alumno = $id_al AND fecha = '$fecha'");
                                   //default de asistencia
                                   $estatus = (mysqli_num_rows($res_asistencia) > 0) ? mysqli_fetch_assoc($res_asistencia)['estatus'] : 'A';
                                   ?>
                                  
                                   <div class="fila-alumno">
                                       <form method="POST" class="form-asistencia">
                                           <input type="hidden" name="id_alumno" value="<?php echo $id_al; ?>">
                                           <input type="hidden" name="fecha" value="<?php echo $fecha; ?>">
                                          
                                           <span><?php echo htmlspecialchars($alumno['nombre']); ?></span>
                                           <span><?php echo date("d/m", strtotime($fecha)); ?></span>
                                          
                                           <select name="estatus" class="select-asistencia">
                                               <option value="A" <?php echo ($estatus == 'A') ? 'selected' : ''; ?>>ASISTIÓ</option>
                                               <option value="F" <?php echo ($estatus == 'F') ? 'selected' : ''; ?>>FALTA</option>
                                               <option value="J" <?php echo ($estatus == 'J') ? 'selected' : ''; ?>>JUSTIFICADA</option>
                                           </select>
                                          
                                           <button type="submit" name="btn_actualizar">Actualizar</button>
                                       </form>
                                   </div>
                               <?php endwhile; ?>
                           <?php else: ?>
                               <p>No hay alumnos registrados en este grupo.</p>
                           <?php endif; ?>
                       </div>
                   </details>
               <?php endforeach; ?>
           <?php else: ?>
               <p>No se ha seleccionado ninguna fecha de asistencia.</p>
           <?php endif; ?>
       </main>
   </div>
</body>
</html>
