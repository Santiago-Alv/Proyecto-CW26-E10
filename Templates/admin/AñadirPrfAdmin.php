<?php

//session_start();
//Prueba para ver si funciona (sin BD)
include '../../Dynamics/contrasenia.php';
include '../../config/config_db.php';

$estado = 'formulario'; //Posibles: 'formulario', 'error_existe', 'exito'
$numero_trabajador_creado ="";
$contrasena_generada = "";

if (isset($_POST['trabajador'])) {
    $nombre_profe = $_POST['nombre'];
    $num_trabajador = $_POST['trabajador'];

    if ($num_trabajador === '12345') {
        $estado = 'error_existe';
    } else {
        //$contrasena_generada = "contra" . rand(1000, 9999);
        $numero_trabajador_creado = $num_trabajador;
        $estado = 'exito';
    }
    //Quitar de ocmentario y ponerlo para BD, el de arriba es de prueba
    $sql = "SELECT numero_trabajador FROM profesor WHERE numero_trabajador = '" . $num_trabajador ."'";
    $resultado_query = mysqli_query($conexion, $sql);

    if($resultado_query) {
        $fila = mysqli_fetch_assoc($resultado_query);
        if ($fila) {
            $estado = 'error_existe';
        } else {
            $contrasena_generada = generarpassword(4);
            $contrasena_hasheada = hash("sha256", $contrasena_generada);

            $sql2 = "INSERT INTO profesor (nombre_profesor, numero_trabajador, contraseña) 
                VALUES ('" . $nombre_profe . "', " . $num_trabajador . ", '" . $contrasena_hasheada . "')";
            
            $query2 = mysqli_query($conexion, $sql2);
            if ($query2) {
                $numero_trabajador_creado = $num_trabajador;
                $estado ='exito';
            } else {
                echo"Error al insertar en la base de datos.";
            }
        }
    }

}
// consulta db

// placeholder
$nombre_admin = "Angela"; 
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Profesores</title>
    <link rel="stylesheet" href="../../Statics/Css/adminGraph.css">
</head>
<body>

    <?php include '../../utilities/navbar.php'; ?>

    <div class="main-layout">
        <?php include '../../utilities/sidebarAdmin.php'; ?>

        <main class="content">
            <!-- VISTA 1    -->
            <?php if ($estado === 'formulario'): ?>
            <div class="search-container">
                <h1>Profesores</h1>
                <div class="search-title">
                    <span class="plus-icon">+ </span>Agregar Profesor
                </div>

                <p style="margin: 0 0 20px 20px; font-size: 13px; color: #333;">
                    IDEA: <strong>Modo Prueba:</strong> Escribe <strong>12345</strong>
                </p>
                <form action="" method="POST" class="search-form">
                    <div class="input-grupo">
                        <input type="text" name="nombre" placeholder="Nombre" required>
                    </div>
                    <div class="input-grupo">
                        <input type="text" name="trabajador" placeholder="Número de trabajador" required>
                    </div>                    
                    <button type="submit" class="btn-search">Agregar</button>
                </form>
            </div>
            <!-- VISTA 2 -->
            <?php elseif ($estado === 'error_existe'): ?>
                <div class="alerta-container">
                    <div class="alerta-box">
                        <h2>Ya existe un profesor con ese número de trabajador</h2>
                        <a href="?" class="btn-alerta">OK</a>
                    </div>
                </div>
                <!-- VISTA 3 -->
            <?php elseif ($estado === 'exito'): ?>
                <div class="success-view">
                    <h1 class="success-view-title">Creación de profesor exitosa</h1>
                    <div class="info-label">Sus datos con los siguientes:</div>
                    <div class="info-input">
                        Número de trabajador: <?php echo $numero_trabajador_creado; ?>
                    </div>
                    <div class="info-input">
                        contrasena: <?php echo $contrasena_generada; ?>
                    </div>
                    <a href="?" class="btn-aceptar">Aceptar</a>
                </div>
            <?php endif; ?>
        </main>
    </div>

</body>
</html>