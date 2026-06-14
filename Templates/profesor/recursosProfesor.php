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
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['btn_eliminar'])) {
    $id_eliminar = (int)$_POST['id_recurso_eliminar'];
    $sql_buscar_img = "SELECT url_imagen FROM recurso WHERE id_recurso = $id_eliminar";
    $res_buscar = mysqli_query($conexion, $sql_buscar_img);
    if ($row = mysqli_fetch_assoc($res_buscar)) {
        $nombre_archivo = $row['url_imagen'];
        if ($nombre_archivo !== 'temp' && !empty($nombre_archivo)) {
            $ruta_fisica = "../../Statics/img/recursos/" . $nombre_archivo;
            if (file_exists($ruta_fisica)) {
                unlink($ruta_fisica); // unlink es la función de PHP para borrar archivos
            }
        }
    }
    $sql_borrar = "DELETE FROM recurso WHERE id_recurso = $id_eliminar";
    mysqli_query($conexion, "$sql_borrar");
    header("Location: recursosProfesor.php?id_grupo=" . $id_grupo_actual);
    exit();// 
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Recursos Profesor</title>
    <link rel="stylesheet" href="../../Statics/Css/subirRecurso.css">
</head>
<body>
    <?php include '../../utilities/navbar.php'; ?>
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
                                        <?php if (!empty($recurso['url_imagen']) && $recurso['url_imagen'] !== 'temp'): ?>
                                            <a href="../../Statics/img/recursos/<?php echo $recurso['url_imagen']; ?>" target="_blank" class="btn-ver">
                                                Ver imagen
                                            </a><!-- blank pa q abra otra pestania -->
                                        <?php endif; ?><!-- la solucion q se me ocurrio, cerrar el if manual pq no se cerraba normal-->
                                        <a href="editarRecurso.php?id_recurso=<?php echo $recurso['id_recurso']; ?>&id_grupo=<?php echo $id_grupo_actual; ?>" class="btn-editar" style="text-decoration: none; text-align: center;">
                                            Editar
                                        </a>
                                        <form action="" method="POST" style="margin: 0; padding: 0; display: inline;">
                                            <input type="hidden" name="id_recurso_eliminar" value="<?php echo $recurso['id_recurso']; ?>">
                                            <button type="submit" name="btn_eliminar" class="btn-eliminar" onclick="return confirm('¿Estás seguro de que deseas eliminar este recurso de forma permanente?');">
                                                Eliminar
                                            </button>
                                        </form>
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