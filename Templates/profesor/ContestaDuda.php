<?php
    include '../../config/config_db.php';
    $tipo_usu = "Profesor";
    $nombre_usu = "Jirafales"; 
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contestar dudas</title>
        <link rel="stylesheet" href="../../Statics/Css/AdminProfe.css">
        <link rel="stylesheet" href="../../Statics/Css/profeGraph.css">
    </head>
    <body>
        <?php include '../../utilities/navbar.php'; ?>
        
        <div class="main-layout">
            <?php include '../../utilities/sidebarProfe.php'; ?>
            
            <main id= "contenido">
            <div class="input-datosprof">
                <h2>Dudas de alumnos</h2>   
                <p id="txt-contestar">Contestar y modificar</p>
                <p id="txt-duda"> aaaaaaaaaaaaaaa</p>
            </div> 
            <div class="boton-enviar">
                <form action="ForoDudaProfe.php">
                    <textarea name="pregunta" id="ipt-pregunta" placeholder="Escribe tu duda aquí" required></textarea>
                    <button type="submit" id="contestar-submit">Enviar</button>
                </form>
            </div>
          
        </main>   
        </div>
        
    </body>
</html>
    
