<?php
session_start();

include '../../config/config_db.php';
$listaGrupos = array();

    if (isset($_SESSION['usuario']) && $_SESSION['usuario'] == 'profesor') {
        
        $sql = "SELECT id_grupo, nombre_grupo FROM grupo WHERE id_profesor = " . $_SESSION['id_profesor'] . "";
        $query = mysqli_query($conexion,$sql);
        while($fila = mysqli_fetch_assoc($query)){
            $listaGrupos[] = $fila;
        }
    } else {
        header("Location: ../../index.php");
    }


?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href = "..\..\Statics\Css\profesorGraph.css">
        <title>Home</title>
    </head>
    <body>
        <header>
            <img class="logo" src= "..\..\Statics\img\logo-unam.png">

            <a href="..\index.php">Cerrar Sesión</a>
        </header>
    
        <nav>
            <div class="breadcrumbs">
                <a href="./homeProfesor.php">🏠</a>
                <span>&lt;</span>
                <span>&gt;</span>
                <span>Profesor Jirafales</span>
            </div>
        </nav>

        <div class="mainCont">
            <aside>
                <?php
                    foreach($listaGrupos as $grupo){
                        echo "<a class='menuOp' href='./grupoProfesor.php?id_grupo=". $grupo['id_grupo'] ." '> " . $grupo['nombre_grupo'] . " </a>";
                    }
                ?>
                <a class="menuOp"> RECURSOS </a>
                <a class="menuOp"> DUDAS </a>
            </aside>

            <main>
                <h1>Bienvenido Profesor Jirafales</h1>
            </main>
        </div>

    </body>
</html>