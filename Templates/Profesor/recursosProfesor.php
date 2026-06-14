<?php
//ini_set('display_errors', 1);
//error_reporting(E_ALL);
session_start();
include '../../config/config_db.php'; 
$conexion = connect();

if (!isset($_GET['id_grupo']) || empty($_GET['id_grupo'])) {
    die("Error: No se ha seleccionado un grupo válido.");
}
$id_grupo_actual = (int)$_GET['id_grupo'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Recursos Profesor</title>
    <link rel="stylesheet" href="../../Statics/Css/subirRecurso.css">
</head>
<body>
    <?php include '../../utilities/navbarProfe.php'; ?>
    <div class="main-layout">
        <?php 
        $pagina_activa = 'recursos'; 
        include '../../utilities/sidebarProfe.php'; 
        ?>
        <main class="content view-recursos">
            <div class="recursos-container">
                <div class="tabs-superiores">
                    <div class="tab-activo">RECURSOS</div>
                        <a href="subirRecurso.php?id_grupo=<?php echo $id_grupo_actual; ?>" class="tab-verde">Añadir recurso</a>
                </div>
                <div class="lista-recursos">
                    <?php
                    $sql_recursos = "SELECT * FROM recurso WHERE id_grupo = $id_grupo_actual ORDER BY id_recurso DESC";//de nuevo a viejo
                    $res_recursos = mysqli_query($conexion, $sql_recursos);
                    if ($res_recursos && mysqli_num_rows($res_recursos) > 0) {
                        while ($recurso = mysqli_fetch_assoc($res_recursos)) {
                        ?>
                            <div class="tarjeta-recurso">
                                <div class="imagen-recurso-contenedor">
                                <?php 
                                if (!empty($recurso['url_imagen']) && $recurso['url_imagen'] !== 'temp') { //q no puede ser temp pq se borra todo si no se realiza correctamente pero x por si acaso
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
                                        <button class="btn-editar">Editar</button>
                                        <button class="btn-eliminar">Eliminar</button>
                                    </div>
                                </div>
        
                                <div class="caja-url">
                                    <?php echo htmlspecialchars($recurso['url_recurso']); ?>
                                </div>
                            </div>

                </div>
                    <?php //este php es como el tomate de tf2, no se pq si lo quito se rompe todo XDDD
                    }
                    } else {
                        echo "<p style='color: #ffffff;'>Aún no hay recursos asignados a este grupo. ¡Agrega uno para empezar!</p>";
                    }
                    ?>

                </div> </div>
        </main>
    </div>
</body>
</html>