<?php
session_start();
include '../../config/config_db.php';
$conexion = connect();


$id_grupo = isset($_GET['id_grupo']) ? (int)$_GET['id_grupo'] : 1;//convierte a int y si no hay se convierte en 1
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
               <h1 style="font-size: 40px; margin:0;"><?php echo $grupo['nombre_grupo']; ?></h1>
               <button class="btn-verde">Agregar alumno</button>
           </div>


           <div class="layout-info-grupo">
               <div class="columna-alumnos">
                   <?php
                   $sql_alum = "SELECT * FROM alumno WHERE id_grupo = $id_grupo";
                   $res_alum = mysqli_query($conexion, $sql_alum);
                   while ($alumno = mysqli_fetch_assoc($res_alum)){
                   ?>
                       <div class="fila-alumno">
                           <span style="font-weight:bold; width: 20%;"><?php echo htmlspecialchars($alumno['nombre'] . ' ' . $alumno['apell_pat_alum']); ?></span>
                           <span>MODULO1</span><!-- Se rompe si no sanitizo (nombres con acentos o comillas) -->
                           <span>MODULO2</span>
                           <span>Asistencia: <?php echo $alumno['asistencia']; ?>%</span>
                           <span>Deserción: --</span>
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
                   <a href="#" class="btn-lateral">Registrar calificación</a>
               </div>
           </div>
       </main>
   </div>
</body>
</html>
