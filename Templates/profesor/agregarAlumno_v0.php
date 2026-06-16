<?php
    include '../../config/config_db.php';
    session_start();
    
     // placeholder
    $tipo_usu = "Profesor";
    $nombre_usu = "Angie";
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href = "..\..\Statics\Css\profeGraph.css">
        <title>Home</title>
    </head>
    <body>
        <?php include '../../utilities/navbarProfe.php'; ?>
        
        <div class="main-layout">
            <?php include '../../utilities/sidebarProfe.php'; ?>

            <main class="opModProfe">
                <h2> 61B </h2>
                <div class="search-title">
                    <span>➕ Agregar alumno</span>
                </div>
                <form action="" method="GET" class="search-form">
                    <input type="text" name="nombre" placeholder="Nombre del alumno">
                    <input type="text" name="cuenta" placeholder="Número de cuenta">
                    <button type="submit" class="btn-search">Buscar</button>
                </form>

            </main>
        </div>

    </body>
</html>