<?php

//session_start();


// consulta db

// placeholder
$tipo_usu = "Administrador";
$nombre_usu = "Angela"; 
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Eliminar profesor Administrador</title>
        <link rel="stylesheet" href="../../Statics/Css/AdminProfe.css">
        <link rel="stylesheet" href="../../Statics/Css/adminGraph.css">
    </head>
    <body>
        <?php include '../../utilities/navbar.php'; ?>
        <div class="main-layout">
            <?php include '../../utilities/sidebarAdmin.php'; ?>

            
            <main id= "contenido">
                <div id="confi-elimprof">
                    <h1 id="NombProfAdmin">Profesor<br>Jirafales</h1>   
                    <div class="cont-confirma-elimprof">
                        <label for="pregunta" id= "preg-confirma-elimprof">¿Estás seguro de eliminar a<br>Jirafales ?</label>
                        <div class="botones-confelim">
                            <form action="Holaprofe.php">
                                <button type="submit" id="cancelelim-submit">Cancelar</button>
                            </form>
                            <button type="submit" id="aceptelim-submit">Aceptar</button>
                        </div>
                    </div> 
                </div> 
                <div class="boton-modprofe">
                    <div class = "boton-mod-elim">
                        <form action="AdminModificarProf.php">
                            <button type="submit" id="modprofe-submit">Modificar</button>
                        </form>
                            <button type="submit" id="elimprof-submit">Eliminar</button>
                    </div>
                </div>
            </main>   
        </div>
        
    </body>
</html>
    
