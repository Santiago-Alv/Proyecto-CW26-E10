<?php

//session_start();


// consulta db
include '../../config/config_db.php';

    $sql = "SELECT id_grupo, nombre_grupo FROM grupo";
    $query = mysqli_query($conexion, $sql); 
    $nomb_grupos = array();
    if($query)
    {
        while($fila = mysqli_fetch_assoc($query))
        {   
            $nomb_grupos[]= $fila;
            //var_dump($nomb_grupos);
        }
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
    <title>Gestión de Alumnos</title>
    <link rel="stylesheet" href="../../Statics/Css/adminGraph.css">
</head>
<body>

    <?php include '../../utilities/navbar.php'; ?>

    <div class="main-layout">
        <?php include '../../utilities/sidebarAdmin.php'; ?>

        <main class="content">
            <div class="header-content">
                <h1>Alumnos</h1>
            </div>

            <div class="search-container">
                <div class="search-title">
                    <span>+ Agregar alumno</span>
                </div>
                <form action="revisarAñadirAlumAdmin.php"  method="POST" class="agregar-form">
                    <input type="text" name="nombre" placeholder="Nombre del alumno" required>
                    <input type="number" name="cuenta" placeholder="Número de cuenta" required>
                    <select name= "grupoalumn" class="select-alugrupo" required>
                        <option>Seleccionar grupo</option>
                        <?php 
                            
                            if(count($nomb_grupos)>0)
                            {
                                foreach($nomb_grupos as $nomb_grup)
                                {
                                    $id_grupo = $nomb_grup["id_grupo"];
                                    $nombregrupo = $nomb_grup["nombre_grupo"];
                                    echo "<option value='$id_grupo'>$nombregrupo</option>";
                                    
                                }
                            } 
                        ?>
                        </select>
                    <button type="submit" class="btn-agregar">Agregar</button>
                </form>
                <?php
                //
                ?>
            </div>
        </main>
    </div>

</body>
</html>