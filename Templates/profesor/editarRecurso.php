<?php
//ini_set('display_errors', 1);
//error_reporting(E_ALL);
session_start();
include '../../config/config_db.php'; 
$conexion = connect();
$mensaje = "";

if (!isset($_GET['id_recurso']) || !isset($_GET['id_grupo'])) {
    die("Error: Faltan referencias del recurso o grupo.");
}
$id_recurso_actual = (int)$_GET['id_recurso'];
$id_grupo_actual = (int)$_GET['id_grupo'];
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['btn_actualizar'])) {
    $nombre_recurso = mysqli_real_escape_string($conexion, $_POST['nombre_recurso']);
    $descripcion    = mysqli_real_escape_string($conexion, $_POST['descripcion']);
    $url_recurso    = mysqli_real_escape_string($conexion, $_POST['url']);
    $id_modulo      = mysqli_real_escape_string($conexion, $_POST['id_modulo']);

    $sql_update = "UPDATE recurso SET 
                    nombre_recurso = '$nombre_recurso', 
                    descripcion = '$descripcion', 
                    url_recurso = '$url_recurso',
                    id_modulo = '$id_modulo' 
                   WHERE id_recurso = $id_recurso_actual";
    if (mysqli_query($conexion, $sql_update)) {
        //  Si NUEVA IMAGEN
        if (isset($_FILES['imagen_recurso']) && $_FILES['imagen_recurso']['error'] === UPLOAD_ERR_OK) {
            // Buscar la imagen vieja 
            $res_vieja = mysqli_query($conexion, "SELECT url_imagen FROM recurso WHERE id_recurso = $id_recurso_actual");
            if ($row = mysqli_fetch_assoc($res_vieja)) {
                $img_vieja = $row['url_imagen'];
                if ($img_vieja !== 'temp' && !empty($img_vieja)) {
                    $ruta_vieja = "../../Statics/img/recursos/" . $img_vieja;
                    if (file_exists($ruta_vieja)) {
                        unlink($ruta_vieja); //borar
                    }
                }
            }
            $extension = pathinfo($_FILES['imagen_recurso']['name'], PATHINFO_EXTENSION);//sacar extension reciclahe
            $nuevo_nombre_imagen = "imagenrecurso_" . $id_recurso_actual . "." . $extension;
            $ruta_final = "../../Statics/img/recursos/" . $nuevo_nombre_imagen;
            if (move_uploaded_file($_FILES['imagen_recurso']['tmp_name'], $ruta_final)) {
                mysqli_query($conexion, "UPDATE recurso SET url_imagen = '$nuevo_nombre_imagen' WHERE id_recurso = $id_recurso_actual");
            }
        }
        header("Location: recursosProfesor.php?id_grupo=" . $id_grupo_actual);
        exit();
    } else {
        $mensaje = "Error al actualizar en BD: " . mysqli_error($conexion);
    }
}
// prerellenar de dato actuale
$sql_datos = "SELECT * FROM recurso WHERE id_recurso = $id_recurso_actual";
$res_datos = mysqli_query($conexion, $sql_datos);
$recurso = mysqli_fetch_assoc($res_datos);
if (!$recurso) {
    die("Error: El recurso no existe.");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Recurso</title>
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

                <?php if($mensaje != ""): ?>
                    <p style="color: #ffeb3b; font-weight: bold; margin-bottom: 15px;"><?php echo $mensaje; ?></p>
                <?php endif; ?>

                <div class="seccion-formulario">
                    <div class="header-rectangular">
                        <span class="icono-mas" style="font-size: 20px;">✏️</span> Editar recurso
                    </div>
                    
                    <form action="" method="POST" enctype="multipart/form-data" class="contenedor-inputs">
    
                        <input type="text" name="nombre_recurso" class="input-gris input-largo" placeholder="Título del recurso" value="<?php echo htmlspecialchars($recurso['nombre_recurso']); ?>" required>
    
                        <input type="text" name="descripcion" class="input-gris input-largo" placeholder="Descripción" value="<?php echo htmlspecialchars($recurso['descripcion']); ?>" required>
                        
                        <input type="text" name="url" class="input-gris input-largo" placeholder="URL" value="<?php echo htmlspecialchars($recurso['url_recurso']); ?>" required>
    
                        <div class="input-gris input-largo" style="padding-bottom: 5px;">
                            <p style="font-size: 12px; margin: 0 0 5px 0; color: #777;">Sube un archivo solo si deseas cambiar la imagen actual:</p>
                            <input type="file" name="imagen_recurso" id="imagen" style="width: 100%; color: #555;">
                        </div>
    
                        <select name="id_modulo" class="input-gris input-corto" required>
                            <option value="">Selecciona modulo</option>
                            <?php
                            $res_modulos = mysqli_query($conexion, "SELECT id_modulo, nombre_modulo FROM modulo");
                            while ($modulo = mysqli_fetch_assoc($res_modulos)) {
                                // auto modulo si no ps nadota
                                $selected = ($modulo['id_modulo'] == $recurso['id_modulo']) ? "selected" : "";
                                echo "<option value='" . $modulo['id_modulo'] . "' $selected>" . htmlspecialchars($modulo['nombre_modulo']) . "</option>";
                            }
                            ?>
                        </select>
    
                        <div class="alinear-boton">
                            <a href="recursosProfesor.php?id_grupo=<?php echo $id_grupo_actual; ?>" style="color: #333; margin-right: 15px; text-decoration: none; font-size: 14px;">Cancelar</a>
                            <button type="submit" name="btn_actualizar" class="btn-gris" style="background-color: #e6e61a;">Actualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
</body>
</html>