<?php

session_start();


// consulta db
include '../../config/config_db.php';

$listaModulos = array();
$listaProfesores = array();

    $sql ="SELECT id_modulo,nombre_modulo FROM modulo";
    $query = mysqli_query($conexion,$sql);
    if($query){
        while($fila = mysqli_fetch_assoc($query)){
            $listaModulos[] = $fila;
        }
    }

    $sql ="SELECT id_profesor,nombre_profesor FROM profesor";
    $query = mysqli_query($conexion,$sql);
    if($query){
        while($fila = mysqli_fetch_assoc($query)){
            $listaProfesores[] = $fila;
        }
    }


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
                <h1>Grupos</h1>
            </div>

            <div class="search-container">
                <div class="search-title">
                    <span>+ Agregar grupo</span>
                </div>
                <form action = "./revisarAñadirGrupo.php"  method="POST" class="agregar-form">
                    <input type="text" name="nombre" maxLength ="3" placeholder="Nombre del grupo" required>
                    <select name= "moduloActivo" class="select-alugrupo" required>
                        <option>Módulo activo</option>
                        <?php 
                            
                            if(count($listaModulos)>0)
                            {
                                foreach($listaModulos as $modulo)
                                {
                                    $id_modulo = $modulo["id_modulo"];
                                    $nombre_modulo = $modulo["nombre_modulo"];
                                    echo "<option value='$id_modulo'>$nombre_modulo</option>";
                                    
                                }
                            } 
                        ?>
                        </select>
                        <select name= "profesorGrupo" class="select-alugrupo" required>
                        <option>Selecionar Profesor</option>
                        <?php 
                            
                            if(count($listaProfesores)>0)
                            {
                                foreach($listaProfesores as $profesor)
                                {
                                    $id_profesor = $profesor["id_profesor"];
                                    $nombre_profesor = $profesor["nombre_profesor"];
                                    echo "<option value='$id_profesor'>$nombre_profesor</option>";
                                    
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