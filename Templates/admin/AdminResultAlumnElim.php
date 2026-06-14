<?php

//session_start();


// consulta db

// placeholder
$nombre_admin = "Angela"; 
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Eliminar profesor Administrador</title>
        <link rel="stylesheet" href="../../Statics/Css/AdminAlumno.css">
        <link rel="stylesheet" href="../../Statics/Css/adminGraph.css">
    </head>
    <body>
        <?php include '../../utilities/navbarAdmin.php'; ?>
        <div class="main-layout">
            <?php include '../../utilities/sidebarAdmin.php'; ?>

            <main id= "contenido">
                <div id="confi-elimalumn">
                    <h1 id="NombAlumAdmin">Alumno<br>Juanito Juana</h1>   
                    <div class="cont-confirma-elimalumn">
                        <label for="pregunta" id= "preg-confirma-elimalumn">¿Estás seguro de eliminar a<br>Juanito Juanito ?</label>
                        <div class="botones-confelim">
                            <form action="Holaprofe.php">
                                <button type="submit" id="cancelelim-submit">Cancelar</button>
                            </form>
                            <button type="submit" id="aceptelim-submit">Aceptar</button>
                        </div>
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
                </div>
            </main>   
        </div>
        
    </body>
</html>
    
