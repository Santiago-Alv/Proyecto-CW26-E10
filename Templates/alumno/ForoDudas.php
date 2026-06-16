<?php
    include '../../config/config_db.php';
    session_start();
    //$nomb_alumno 
    //$grupo
    //$modulo
    //$id_grupo = $_SESSION['grupo'];
    $id_grupo = $_SESSION['id_grupo'];
    $modulo_activo = $_SESSION['moduloActivo'];
    $id_alumno= $_SESSION['id_alumno'];

    $duda = "";
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['pregunta']))
    {
        $duda = $_POST['pregunta'];

        $sql = "INSERT INTO duda (estado_duda, duda_text, id_alumno, id_grupo, id_modulo)
                VALUES ('P','$duda', $id_alumno,$id_grupo,$modulo_activo)";
        $query = mysqli_query($conexion, $sql); 

    }


?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Foro de dudas de alumno</title>
        <link rel="stylesheet" href="../../Statics/Css/ForoDudas.css">
        <link rel="stylesheet" href="../../Statics/Css/AlumGraph.css">
        
    </head>
    <body>
        <?php include '../../utilities/navbarAlumno.php'; ?>
        <div class="main-layout">
            <?php include '../../utilities/sidebarAlumn.php'; ?>
            <main id= "contenido">
                <div id="contenido_foro">
                    <form action="" method = "POST" class="input-pregunta">
                        <label for="pregunta">¿Qué duda tienes? <br>Menciona el tema o la duda en general que tengas.<br></label>
                        <textarea name="pregunta" id="ipt-pregunta" placeholder="Escribe tu duda aquí" required></textarea>
                        <button type="submit" id="pregunta-submit">Enviar</button>
                    </form>     
                    <div class="botonesforo">
                            <form action="historialpreguntas.php">
                                <button type="submit" id="historial-submit">Ver historial</button>
                            </form>
                    </div> 
                </div>                     
            </main>  
        </div>  
    </body>
</html>
    
