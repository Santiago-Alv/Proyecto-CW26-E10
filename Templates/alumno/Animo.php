<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();
$nombre_alumn = "Higashikata Josuke";
$grupo_alumn = "61B";

include '../../config/config_db.php';
$conexion = connect();

$id_alumno = isset($_SESSION['id_alumno']) ? $_SESSION['id_alumno'] : 1; 
$mensaje = "";
$ya_voto = false;

$sql_modulo = "SELECT modulo_activo FROM grupo WHERE id_grupo = (SELECT id_grupo FROM alumno WHERE id_alumno = $id_alumno)";
$res_modulo = mysqli_query($conexion, $sql_modulo);

$id_modulo = 1; //default por si algo truena
if ($res_modulo && mysqli_num_rows($res_modulo) > 0) {
    $fila_modulo = mysqli_fetch_assoc($res_modulo);
    $id_modulo = (int)$fila_modulo['modulo_activo'];
}
// YEARWEEK(numero de semana del año) 1= lunes
$sql_check = "SELECT id_animo FROM estadodeanimo WHERE id_alumno = $id_alumno AND YEARWEEK(fecha, 1) = YEARWEEK(CURDATE(), 1)";//curdate=hoy
$res_check = mysqli_query($conexion, $sql_check);

if ($res_check && mysqli_num_rows($res_check) > 0) {
    $ya_voto = true;//ps ya voto
    $mensaje = "¡Ya registraste tu estado de ánimo esta semana! Nos vemos la próxima.";
}

//AUN NO HA VOTADO
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btn_enviar_animo']) && !$ya_voto) {
    
    $emocion = mysqli_real_escape_string($conexion, $_POST['animo']);
    $fecha_actual = date('Y-m-d'); 
    $sql_insert = "INSERT INTO estadodeanimo (id_alumno, fecha, emocion, id_modulo) VALUES ($id_alumno, '$fecha_actual', '$emocion', $id_modulo)";
    
    if (mysqli_query($conexion, $sql_insert)) {
        $ya_voto = true;
        $mensaje = "¡Estado de ánimo guardado con éxito!";
    } else {
        $mensaje = "Hubo un error al guardar: " . mysqli_error($conexion);//manda error xd
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <link rel="stylesheet" href="../../Statics/Css/AlumGraph.css">
    <link rel="stylesheet" href="../../Statics/Css/animo.css">
    <title>Pregunta ánimo</title>
</head>
<body>
    <?php include '../../utilities/navbarAlumno.php'; ?>
    <div class="main-layout">
        <?php include '../../utilities/sidebarAlumn.php'; ?>

        <main id="contenido" style="display: flex; flex-direction: column; align-items: center; justify-content: center; width: 100%;">
            <div class="circulo-carita" style="margin-bottom: 20px;">
                <img src="../../Statics/img/carita.png" alt="carita">
            </div>

            <div class="cuadro-principal" style="width: 100%; max-width: 600px;">
                
                <div class="cuadro-pregunta" style="text-align: center; margin-bottom: 20px;">
                    <h2 >Fecha: <?php echo date("d/m/Y"); ?></h2>
                    <p>¿Cuál fue tu estado de ánimo con las clases de esta semana?</p>
                </div>

                <?php if ($mensaje != ""): ?>
                    <div style="background-color: #f1a80a; padding: 15px; border-radius: 10px; margin-bottom: 20px; text-align: center;">
                        <?php echo $mensaje; ?>
                    </div>
                <?php endif; ?>

                <?php if (!$ya_voto): ?>
                    <form method="POST" action="" style="display: flex; flex-direction: column; align-items: center; width: 100%;">
                        
                        <div class="contenedor-opc" style="display: flex; justify-content: center; gap: 30px; margin-bottom: 30px;">
                            
                            <div class="opcion-carita" style="display: flex; flex-direction: column; align-items: center;">
                                <img src="../../Statics/img/emocionV.png" alt="Feliz" style="width: 60px;">
                                <span class="texto-carita" style="margin: 10px 0;">Buena</span>
                                <input type="radio" name="animo" value="feliz" required>
                            </div>
                            
                            <div class="opcion-carita" style="display: flex; flex-direction: column; align-items: center;">
                                <img src="../../Statics/img/emocionA.png" alt="Regular" style="width: 60px;">
                                <span class="texto-carita" style="margin: 10px 0;">Regular</span>
                                <input type="radio" name="animo" value="regular">
                            </div>
                            
                            <div class="opcion-carita" style="display: flex; flex-direction: column; align-items: center;">
                                <img src="../../Statics/img/emocionR.png" alt="Mala" style="width: 60px;">
                                <span class="texto-carita" style="margin: 10px 0;">Mala</span>
                                <input type="radio" name="animo" value="mala">
                            </div>
                        
                        </div>

                        <button type="submit" name="btn_enviar_animo" class="boton-enviar" style="background-color: #ff7a00; border: none; padding: 10px 30px; border-radius: 20px; color: white; font-weight: bold; cursor: pointer; font-size: 16px;">
                            Enviar
                        </button>
                    </form>
                <?php endif; ?>

            </div>
        </main> 
    </div>
</body>
</html>