<?php
    include '../../config/config_db.php';
    $id_profesor = 0;
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['idprofe']))
    {
        $id_profesor = $_POST['idprofe'];
    }

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nomb-profe'])&& isset($_POST['numcuenta-profe'])&& isset($_POST['correo-profe'])
        && isset($_POST['passw-profe']) && $id_profesor > 0)
    {
        $nombprofe = $_POST['nomb-profe'];
        $ncprofe = (int)$_POST['numcuenta-profe'];
        $correoprofe = $_POST['correo-profe'];
        $passprofe = $_POST['passw-profe'];

        $sql = "UPDATE profesor SET nombre_profesor='$nombprofe', numero_trabajador=$ncprofe, 
                correo_institucional='$correoprofe', contraseña='$passprofe'
                WHERE id_profesor= $id_profesor";
        $query = mysqli_query($conexion, $sql); 

        header("Location: profesores.php?id=".$id_profesor);
            exit();
    }
    $tipo_usu = "Administrador";
    $nombre_usu = "Angela"; 
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Administrador modificación de profesor</title>
        <link rel="stylesheet" href="../../Statics/Css/AdminProfe.css">
        <link rel="stylesheet" href="../../Statics/Css/adminGraph.css">
    </head>
    <body>
        <?php include '../../utilities/navbar.php'; ?>
        
        <div class="main-layout">
            <?php include '../../utilities/sidebarAdmin.php'; ?>
            
            <main>
            <form action='' method='POST'>
                <div id= "contenido">
                    <div class="input-datosprof">
                        <h1>Profesor<br>Jirafales</h1>   
                        <p id="txt-modificar">Modificar</p>
                        <input type="text" name="nomb-profe" id="ipt-mod-nomb-prof" placeholder="Nombre: Jirafales" required>
                        <input type="number" name="numcuenta-profe" id="ipt-mod-numcuenta-prof" placeholder="Número de trabajador: 123456789" required>
                        <input type="email" name="correo-profe" id="ipt-mod-correo-prof" placeholder="Correo: " required>
                        <input type="password" name="passw-profe" id="ipt-mod-passw-prof" placeholder="Contraseña: " required>
                        <input type='hidden' name='idprofe' value= <?php echo $id_profesor; ?>>
                    </div> 
                    <div class="boton-modprofe">
                        <button type="submit" id="acept-modprofe-submit">Aceptar</button>
                    </div>
                </div>
            </form>
            </main>   
        </div>
        
    </body>
</html>
    
