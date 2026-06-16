<?php
    include '../../config/config_db.php';

    $tipo_usu = "Profesor";
    $nombre_usu = "Angie";

    //$modulo_activo = 3;
    //$id_alumno= 2;
    //$id_profesor= 3;
    $respuesta = "";
    $id_duda = 0;

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['idduda']))
    {
        $id_duda = $_POST['idduda'];

        $sql = "SELECT duda_text FROM duda WHERE id_duda= $id_duda";
        $query = mysqli_query($conexion, $sql); 
        $dudatextos = array();
        if($query)
        {
            while($fila = mysqli_fetch_assoc($query))
            {   
                $dudatextos[]= $fila;
            }
        }
        if(count($dudatextos)>0)
        {
            foreach($dudatextos as $dudatexto)
            {
                $duda= $dudatexto["duda_text"];
            }
        }
    }

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['respuesta']) && $id_duda > 0)
    {
        $respuesta = $_POST['respuesta'];
        $id_duda = $_POST['idduda'];

        $sql2 = "UPDATE duda SET estado_duda='R', respuesta='$respuesta' WHERE id_duda= $id_duda";
        $query2 = mysqli_query($conexion, $sql2); 

        header("Location: ForoDudaProfe.php");//regresa a pagina de foro de dudas
            exit();
    }
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contestar dudas</title>
        <link rel="stylesheet" href="../../Statics/Css/Contestarduda.css">
        <link rel="stylesheet" href="../../Statics/Css/profeGraph.css">
    </head>
    <body>
        <?php include '../../utilities/navbarProfe.php'; ?>
        
        <div class="main-layout">
            <?php include '../../utilities/sidebarProfe.php'; ?>
            
            <main id= "contenido">
                <div class="input-datosprof">
                    <h2>Dudas de alumnos</h2>   
                    <p id="txt-contestar">Contestar y modificar</p>
                    <p id="txt-duda"><?php echo $duda?></p>
                </div> 
                <div class="boton-enviar">
                    <form action="" method = "POST">
                        <textarea name="respuesta" id="resp" placeholder="Respuesta" required></textarea>
                        <input type='hidden' name='idduda' value= <?php echo $id_duda; ?>>
                        <button type="submit" id="contestar-submit">Enviar</button>
                    </form>
                </div>
            </main>   
        </div>
        
    </body>
</html>
    
