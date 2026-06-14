<?php
    $nombre_admin = "Angela";
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Administrador modificación de alumno</title>
        <link rel="stylesheet" href="../../Statics/Css/AdminAlumno.css">
        <link rel="stylesheet" href="../../Statics/Css/adminGraph.css">
    </head>
    <body>
        <?php include '../../utilities/navbarAdmin.php'; ?>
        
        <div class="main-layout">
            <?php include '../../utilities/sidebarAdmin.php'; ?>
            
        <main id= "contenido">
            <div class="input-datosalumn">
                <h1>Alumno<br>Juanito Juana</h1>   
                <p id="txt-modificar">Modificar</p>
                <input type="text" name="nomb-alumn" id="ipt-mod-nomb-alumn" placeholder="Nombre: Juanito Juana" required>
                <input type="number" name="numcuenta-alumn" id="ipt-mod-numcuenta-alumn" placeholder="Número de cuenta: 101112131" required>
                <input type="email" name="correo-alumn" id="ipt-mod-correo-alumn" placeholder="Correo: " required>
                <input type="password" name="passw-alumn" id="ipt-mod-passw-alumn" placeholder="Contraseña: " required>
                <div class="grupo-seleccion">
                    <label for="select-grupo">Grupo:</label>
                    <select name="grupo-alumn" id="select-grupo" required>
                        <option value="grupo1">Grupo 61B</option>
                        <option value="grupo2">Grupo 61D</option>
                    </select>
                </div>
            </div> 
            <div class="boton-modalumn">
                <div class="barra-navegacion">
                    <button class="btn-nav">Ver resultado de formulario</button>

                    <a href="?accion=modificar">
                        <button type="submit" id="modalumn-submit" class="<?php echo $accion == 'modificar' ? 'activo' : ''; ?>">Modificar</button>
                    </a>
                    <a href="?accion=eliminar">
                        <button type="submit" id="elimalumn-submit" class="<?php echo $accion == 'modificar' ? 'activo' : ''; ?>">Eliminar</button>
                    </a>
                </div>
                <button type="submit" id="acept-modalumn-submit">Aceptar</button>
            </div>
        </main>   
    </body>
</html>
    