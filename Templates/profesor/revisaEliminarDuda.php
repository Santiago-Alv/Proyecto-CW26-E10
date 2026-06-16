<?php
include '../../config/config_db.php';
//session_start();


// consulta db
    $id_duda = 0;
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['idduda']))
    {
        $id_duda = $_POST['idduda'];
        // var_dump($id_duda);
    }

// placeholder
$tipo_usu = "Profesor";
$nombre_usu = "Angie";
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Eliminar dudas profesor</title>
        <link rel="stylesheet" href="../../Statics/Css/HistorialForoDudas.css">
        <link rel="stylesheet" href="../../Statics/Css/profeGraph.css">
    </head>
    <body>
        <?php include '../../utilities/navbarProfe.php'; ?>
        <div class="main-layout">
            <?php include '../../utilities/sidebarProfe.php'; ?>

            <main id= "contenido">
                <div id="confi-elimprof"> 
                    <div class="cont-confirma-elimprof">
                        <label for="pregunta" id= "preg-confirma-elimprof">¿Estás seguro de eliminarlo?</label>
                        <div class="botones-confelim">
                            <form action="ForoDudaProfe.php">
                                <button type="submit" id="cancelelim-submit">Cancelar</button>
                            </form>
                            <form action="eliminarDuda.php" method = 'POST'>
                                <input type='hidden' name='idduda' value= <?php echo $id_duda; ?>>
                                <button type="submit" id="aceptelim-submit">Aceptar</button>
                            </form>
                        </div>
                    </div> 
                </div> 
            </main>   
        </div>
        
    </body>
</html>
    
