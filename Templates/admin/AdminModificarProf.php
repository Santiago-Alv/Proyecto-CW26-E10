<?php
    $nombre_admin = "Angela";
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
        <?php include '../../utilities/navbarAdmin.php'; ?>
        
        <div class="main-layout">
            <?php include '../../utilities/sidebarAdmin.php'; ?>
            
            <main id= "contenido">
            <div class="input-datosprof">
                <h1>Profesor<br>Jirafales</h1>   
                <p id="txt-modificar">Modificar</p>
                <input type="text" name="nomb-profe" id="ipt-mod-nomb-prof" placeholder="Nombre: Jirafales" required>
                <input type="number" name="numcuenta-profe" id="ipt-mod-numcuenta-prof" placeholder="Número de cuenta: 123456789" required>
                <input type="email" name="correo-profe" id="ipt-mod-correo-prof" placeholder="Correo: " required>
                <input type="password" name="passw-profe" id="ipt-mod-passw-prof" placeholder="Contraseña: " required>
                <p id="txt-grupo">Grupo</p> 
                <div class="checkboxgrupos">
                    <input type= "checkbox" name="grupo61B-profe" id="ipt-mod-61B-prof" value="61B" required>
                    <label for="ipt-mod-61B-prof">Grupo 61B</label>
                    <input type= "checkbox" name="grupo61D-profe" id="ipt-mod-61D-prof" value="61D" required>
                    <label for="ipt-mod-61D-prof">Grupo 61D</label>
                 </div>
            </div> 
            <div class="boton-modprofe">
                <div class = "boton-mod-elim">
                    <button type="submit" id="modprofe-submit">Modificar</button>
                    <form action="historialpreguntas.php">
                        <button type="submit" id="elimprof-submit">Eliminar</button>
                    </form>
                </div>
                    <button type="submit" id="acept-modprofe-submit">Aceptar</button>
            </div>
          
        </main>   
        </div>
        
    </body>
</html>
    
