<?php
    include '../../config/config_db.php';
    //$nomb_alumno 
    //$grupo
    //$modulo
    $modulo_activo = 3;
    $id_alumno= 2;

    $duda = "";
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['pregunta']))
    {
        $duda = $_POST['pregunta'];

        $sql = "INSERT INTO duda (estado_duda, duda_text, respuesta, id_alumno, id_grupo, id_profesor)
                VALUES ('P','$duda', 'respuesta', $id_alumno,1,4)";
        $query = mysqli_query($conexion, $sql); 

    }

    // placeholder
    $tipo_usu = "Alumno";
    $nombre_usu = "Juanito Juanito";
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Foro de dudas de alumno</title>
        <link rel="stylesheet" href="../../Statics/Css/ForoDudas.css">
        <link rel="stylesheet" href="../../Statics/Css/alumGraph.css">
    </head>
    <body>
        <?php include '../../utilities/navbar.php'; ?>
        <div class="main-layout">
            <?php include '../../utilities/sidebarAlumn.php'; ?>
            <main id= "contenido">
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
            </main>  
        </div>  
    </body>
</html>
    
