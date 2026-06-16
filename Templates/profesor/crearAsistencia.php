<?php
//ini_set('display_errors', 1);
//error_reporting(E_ALL);
//session_start();


include '../../config/config_db.php';
$conexion = connect();


$id_grupo = isset($_GET['id_grupo']) ? (int)$_GET['id_grupo'] : 1;//default


$sql_grupo = "SELECT nombre_grupo FROM grupo WHERE id_grupo = $id_grupo";
$res_grupo = mysqli_query($conexion, $sql_grupo);
$grupo = mysqli_fetch_assoc($res_grupo);
$nombre_grupo = $grupo ? $grupo['nombre_grupo'] : "Error en Base de Datos";
?>
<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <title>Crear Asistencia</title>
   <link rel="stylesheet" href="../../Statics/Css/subirRecurso.css">
</head>
<body>
   <?php include '../../utilities/navbarProfe.php'; ?>
   <div class="main-layout">
       <?php
       include '../../utilities/sidebarProfe.php';
       ?>


       <main class="view-recursos">
           <h1 style="font-size: 30px; margin-bottom: 40px; color: #fff;">
               <?php echo $nombre_grupo; ?> CREAR ASISTENCIA
           </h1>
          
           <form action="listaAsistencia.php" method="GET" style="display: flex; flex-direction: column; align-items: center; gap: 40px; max-width: 500px; margin: 0 auto;">
              
               <input type="hidden" name="id_grupo" value="<?php echo $id_grupo; ?>">
              
               <div class="input-gris input-largo" style="display: flex; align-items: center; justify-content: space-between; width: 100%; padding: 15px; box-sizing: border-box;">
                   <label>Input de fecha</label>
                   <input type="date" name="fecha" style="border: none; background: transparent;">
               </div>


               <button type="submit" class="btn-gris" style="font-size: 18px; padding: 15px 40px; background-color: #e2e2e2; border: none; border-radius: 10px; cursor: pointer; font-weight: bold; width: 100%;">
                   Crear asistencia
               </button>
           </form>
       </main>
   </div>
</body>
</html>
