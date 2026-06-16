<?php

//session_start();


// consulta db
    include '../../config/config_db.php';
    $id_profesor = 0;
    $nombprofesor="";
    //var_dump($_POST);
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['idprofe']) && isset($_POST['nombprofe']))
    {
        $id_profesor = $_POST['idprofe'];
        $nombprofesor = $_POST['nombprofe'];
    }

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['btn-aceptar']) && isset($_POST['id']))
    {
        $id_profesor = $_POST['id'];
        $sql = "DELETE FROM profesor WHERE id_profesor= ? ";
        $stmt = mysqli_prepare($conexion,$sql);
        mysqli_stmt_bind_param($stmt,"i", $id_profesor);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        header("Location: searchPrf.php");
        exit();
    }
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
                    <div class="cont-confirma-elimprof">
                        <label for="pregunta" id= "preg-confirma-elimprof">¿Estás seguro de eliminar a<br><?php echo htmlspecialchars($nombprofesor); ?></label>
                        <div class="botones-confelim">
                            <form action="profesores.php" method = 'GET'>
                                <input type='hidden' name='id' value= <?php echo $id_profesor; ?>>
                                <button type="submit" id="cancelelim-submit">Cancelar</button>
                            </form>
                            <form action="" method = 'POST'>
                                <input type='hidden' name='id' value= <?php echo $id_profesor; ?>>
                                <button type="submit" name="btn-aceptar" value="a" id="aceptelim-submit" >Aceptar</button>
                            </form>
                        </div>
                    </div> 
                </div> 
            </main>   
        </div>
        
    </body>
</html>
    
