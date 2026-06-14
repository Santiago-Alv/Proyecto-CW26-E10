<?php
//ini_set('display_errors', 1);
//error_reporting(E_ALL);
session_start();
include '../../config/config_db.php'; 
$conexion = connect();
$mensaje = "";

if (!isset($_GET['id_grupo']) || empty($_GET['id_grupo'])) {
    die("Error: No se ha seleccionado un grupo válido."); //porsi se pasan de piyos y van directos a la pagina sin el get
}
//convierte a int por si andan de hackers
$id_grupo_actual = (int)$_GET['id_grupo'];

// subida
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['btn_subir'])) {
    //sanitizar y eso TODAVIA MAS
    $nombre_recurso = mysqli_real_escape_string($conexion, $_POST['nombre_recurso']);
    $descripcion    = mysqli_real_escape_string($conexion, $_POST['descripcion']);
    $url_recurso    = mysqli_real_escape_string($conexion, $_POST['url']);
    $id_modulo      = mysqli_real_escape_string($conexion, $_POST['id_modulo']);
    
    if (isset($_FILES['imagen_recurso']) && $_FILES['imagen_recurso']['error'] === UPLOAD_ERR_OK) { //upload err ok = 0 erore
        
        $sql_insert = "INSERT INTO recurso (nombre_recurso, descripcion, url_recurso, url_imagen, id_grupo, id_modulo) 
                       VALUES ('$nombre_recurso', '$descripcion', '$url_recurso', 'temp', '$id_grupo_actual', '$id_modulo')";
        
        if (mysqli_query($conexion, $sql_insert)) {
            $id_generado = mysqli_insert_id($conexion);//checa que autoincrement se generara con esto. alo fabrica d alberensteins se les escapo la fabrica entera
            $extension = pathinfo($_FILES['imagen_recurso']['name'], PATHINFO_EXTENSION);//saca la extension del archivo original y nombre
            $nuevo_nombre_imagen = "imagenrecurso_" . $id_generado . "." . $extension;
            $ruta_final = "../../Statics/img/recursos/" . $nuevo_nombre_imagen;
            
            if (move_uploaded_file($_FILES['imagen_recurso']['tmp_name'], $ruta_final)) {
                mysqli_query($conexion, "UPDATE recurso SET url_imagen = '$nuevo_nombre_imagen' WHERE id_recurso = $id_generado");//ps ya tenemos nombre no ocupamos temp
                $mensaje = "¡Recurso subido con éxito!";
            } else {
                mysqli_query($conexion, "DELETE FROM recurso WHERE id_recurso = $id_generado");//borra si no
                $mensaje = "Error: No se pudo mover el archivo.";
            }
        } else {
            $mensaje = "Error en BD: " . mysqli_error($conexion);
        }
    } else {
        $mensaje = "Por favor selecciona una imagen válida.";
    }
}
//mantenemos profesionalidad diciendo que para nada vi todo en stack y purisima documentacion
//https://www.php.net/manual/es/function.move-uploaded-file.php ESO SI LOVI EN DOC
//y https://www.php.net/manual/es/function.pathinfo.php uwu
//si nos sobra tiempo hacemos validacion de archvio pa q no nos metan el memz
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Subir Recurso</title>
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
                        <span class="icono-mas">+</span> Añadir nuevo recurso
                    </div>
                    
                    <form action="" method="POST" enctype="multipart/form-data" class="contenedor-inputs">
    
                        <input type="text" name="nombre_recurso" class="input-gris input-largo" placeholder="Título del recurso" required>
    
                        <input type="text" name="descripcion" class="input-gris input-largo" placeholder="Descripción" required>
                        <input type="text" name="url" class="input-gris input-largo" placeholder="URL" required>
    
                        <div class="input-gris input-largo">
                            <input type="file" name="imagen_recurso" id="imagen" required style="width: 100%; padding-top: 5px; color: #555;">
                        </div>
    
                        <select name="id_modulo" class="input-gris input-corto" required>
                            <option value="">Selecciona modulo</option>
                            <?php
                            $res_modulos = mysqli_query($conexion, "SELECT id_modulo, nombre_modulo FROM modulo");
                            while ($modulo = mysqli_fetch_assoc($res_modulos)) {
                                echo "<option value='" . $modulo['id_modulo'] . "'>" . htmlspecialchars($modulo['nombre_modulo']) . "</option>";
                            }
                            ?>
                        </select>
    
                        <div class="alinear-boton">
                            <button type="submit" name="btn_subir" class="btn-gris">Subir</button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
</body>
</html>