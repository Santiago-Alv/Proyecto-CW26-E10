<?php
include '../../config/config_db.php';

    $mostrar_bienvenida = false;
    if (isset($_POST['recursos'])) {
        $mostrar_bienvenida = true;
    }
session_start();


// consulta db


?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Modulo alumno</title>
        <link rel="stylesheet" href="../../Statics/Css/AlumGraph.css">
        <link rel="stylesheet" href="../../Statics/Css/forminialumno.css">
        <?php if ($mostrar_bienvenida): ?>
            <meta http-equiv="refresh" content="5;url=../Alumno/Homealumno.php">
        <?php endif; ?>
    </head>
    <body>
        <?php include '../../utilities/navbarAlumno.php'; ?>
        <div class="main-layout">
        <div class="sidebar-bloqueada">
            <?php include '../../utilities/sidebarAlumn.php'; ?>
        </div>
        <main id= "contenido">
            <div id = "tituloModulo">
                <h1>Cuestionario inicial </h1>
            </div>
            <form action="" method="POST" class="form-cuestionario">
                <div class = "form-grupo">
                    <label class="Pregunta-label">1.- ¿Con qué recurso te gustaría llevar las clases?</label>
                    <div class="options-grupo">
                        <label><input type="radio" name="recursos" value="videos" required> Videos</label>
                        <label><input type="radio" name="recursos" value="imagenes" > Imágenes</label>
                        <label><input type="radio" name="recursos" value="equipo" > Actividades en equipo</label>
                    </div>
                </div>
                <div class="form-grupo">
                    <label class="Pregunta-label">2.- ¿Te gustaría que las clases tengan variedad de actividades? (Individuales o en equipo)</label>
                    <div class="options-grupo">
                        <label><input type="radio" name="variedad" value ="si" required> SI</label>
                        <label><input type="radio" name="variedad" value ="no" > NO</label>
                    </div>
                </div>
                <div class="form-grupo">
                    <label class="Pregunta-label">3.- Tema que te gustaría ver en el curso</label>
                    <textarea name="tema_interes" rows="4" class="text-input" placeholder="Escribe aquí tu respuesta..."></textarea>
                </div>
                <div class="submit-c">
                    <button type="submit" class="btn-submit">MANDAR CUESTIONARIO</button>
                </div>
            </form>
            <?php if ($mostrar_bienvenida): ?>
            <div id="overlay-bienvenida">
                <div class="mensaje-c">
                    <h1>¡BIENVENIDO A LA ETE DE COMPUTACIÓN!</h1>
                    <div class="Carita-icon">😊</div>
                </div>
            </div>
            <?php endif; ?>
        </main>
    </body>
</html>