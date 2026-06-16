<?php

session_start();


// consulta db
    include '../../config/config_db.php';

$profesor = '';
$modulo = '';
    if(isset($_GET['grupo'])){
        $nombre_grupo = $_GET['grupo'];

        $sql = "SELECT * FROM grupo WHERE nombre_grupo = '$nombre_grupo'";
        $query = mysqli_query($conexion,$sql);
        if($query){
            $fila = mysqli_fetch_assoc($query);
        } else {
            header('Location: ./searchGrupo.php');
            exit();
        }

        $sql2 = "SELECT nombre_modulo FROM modulo WHERE id_modulo = ". $fila['modulo_activo'] ."";
        $query2 = mysqli_query($conexion,$sql2);
        if($query2){
            $fila2 = mysqli_fetch_assoc($query2);
        }

        $modulo = $fila2['nombre_modulo'];

        $sql3 = "SELECT nombre_profesor FROM profesor WHERE id_profesor = ". $fila['id_profesor'] ."";
        $query3 = mysqli_query($conexion,$sql3);
        if($query3){
            $fila3 = mysqli_fetch_assoc($query3);
        }

        $profesor = $fila3['nombre_profesor'];

    } else {
        header('Location: ./searchGrupo.php');
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
                <h1>Creación de alumno exitosa</h1>
            </div>
            <div class="search-container">
                <?php
        
                    echo "<div class='search-title'>";
                        echo "<span>Sus datos son los siguientes:</span>";
                    echo "</div>";
                    echo "<form action='./searchGrupo.php' class='aceptagregar-form'>";
                        echo "<p>Nombre: $nombre_grupo </p>";
                        echo "<p>Modulo Activo: $modulo</p>";
                        echo "<p>Profesor: $profesor</p>";
                    
                        echo "<button type='submit' class='btn-aceptagregar'>Aceptar</button>";
                    echo "</form>";
                ?>
            </div>
        </main>
    </div>

</body>
</html>