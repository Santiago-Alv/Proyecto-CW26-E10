<?php
session_start();
include '../../config/config_db.php'; 
$conexion = connect();
if (!isset($_GET['id_grupo']) || empty($_GET['id_grupo'])) {
    die("Error: No se ha seleccionado un grupo válido.");
}
$id_grupo_actual = (int)$_GET['id_grupo'];
$id_modulo_actual = isset($_GET['id_modulo']) ? (int)$_GET['id_modulo'] : 1; 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Recursos Alumno</title>
    <link rel="stylesheet" href="../../Statics/Css/subirRecurso.css">
    <link rel="stylesheet" href="../../Statics/Css/AlumGraph.css">
    <link rel="stylesheet" href="../../Statics/Css/HomeAlumno.css">
</head>
<body>
    <?php include '../../utilities/navbarAlumno.php'; ?>
    <div class="main-layout">
        <?php 
        $pagina_activa = 'recursos'; 
        include '../../utilities/sidebarAlumn.php';
        ?>
        <main class="content view-recursos">
            <div class="recursos-container">
                <div class="tabs-superiores">
                    <div class="tab-activo">RECURSOS DEL MÓDULO <?php echo $id_modulo_actual; ?></div>
                </div>
                <div class="lista-recursos">
                    <?php
                    $sql_recursos = "SELECT * FROM recurso WHERE id_grupo = $id_grupo_actual AND id_modulo = $id_modulo_actual ORDER BY id_recurso DESC";
                    $res_recursos = mysqli_query($conexion, $sql_recursos);
                    
                    if ($res_recursos && mysqli_num_rows($res_recursos) > 0) {
                        while ($recurso = mysqli_fetch_assoc($res_recursos)) {
                        ?>
                            <div class="tarjeta-recurso">
                                <div class="imagen-recurso-contenedor">
                                <?php 
                                if (!empty($recurso['url_imagen']) && $recurso['url_imagen'] !== 'temp') { 
                                    $ruta_imagen = "../../Statics/img/recursos/" . $recurso['url_imagen'];
                                    echo "<img src='$ruta_imagen' alt='Imagen del recurso' class='img-tarjeta'>";
                                } else {
                                    echo "<div class='sin-imagen'>Sin Imagen</div>";
                                }
                                ?>
                                </div>
                                <div class="contenido-tarjeta-derecha">
                                    <div class="tarjeta-header">
                                        <div class="textos-tarjeta">
                                            <h3><?php echo htmlspecialchars(strtoupper($recurso['nombre_recurso'])); ?></h3>
                                            <p>(<?php echo htmlspecialchars($recurso['descripcion']); ?>)</p>
                                        </div>
                                    
                                    <div class="botones-tarjeta">
                                        <?php if (!empty($recurso['url_imagen']) && $recurso['url_imagen'] !== 'temp'): ?>
                                            <a href="../../Statics/img/recursos/<?php echo $recurso['url_imagen']; ?>" target="_blank" class="btn-ver">
                                                Ver imagen
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
        
                                <div class="caja-url">
                                    <a href="<?php echo htmlspecialchars($recurso['url_recurso']); ?>" target="_blank" style="color: #2ecc71; text-decoration: none; font-weight: bold;">
                                        Oprimir enlace del recurso: <?php echo htmlspecialchars($recurso['url_recurso']); ?>
                                    </a>
                                </div>
                            </div>
                </div>
                    <?php //este php es como el tomate de tf2, no se pq si lo quito se rompe todo XDDD
                        }
                    } else {
                        echo "<p style='color: #ffffff;'>Aún no hay recursos asignados para este módulo en tu grupo.</p>";
                    }
                    ?>
                </div> 
            </div>
        </main>
    </div>
</body>
</html>