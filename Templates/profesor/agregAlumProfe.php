<?php

//session_start();


// consulta db
include '../../config/config_db.php';
    $id_grupo = 0;
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['idgrupo']))
    {
        $id_grupo = $_POST['idgrupo'];
        //var_dump($id_grupo);
    }


// placeholder
$tipo_usu = "Profesor";
$nombre_usu = "Angela";  
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Alumnos por profe</title>
    <link rel="stylesheet" href="../../Statics/Css/profeGraph.css">
    <link rel="stylesheet" href="../../Statics/Css/agregarAlumProfe.css">
    <link rel="stylesheet" href="../../Statics/Css/subirRecurso.css">
    
</head>
<body>

    <?php include '../../utilities/navbarProfe.php'; ?>

    <div class="main-layout">
        <?php include '../../utilities/sidebarProfe.php'; ?>

        <main class="content">
            <div class="header-content">
                <h1>Alumnos</h1>
            </div>

            <div class="search-container">
                <div class="search-title">
                    <span>+ Agregar alumno</span>
                </div>
                <form action="revisarAgregarAlumProfe.php"  method="POST" class="agregar-form">
                    <input type="text" name="nombre" placeholder="Nombre del alumno" required>
                    <input type="number" name="cuenta" placeholder="Número de cuenta" required>
                    <input type="hidden" name= "grupoalumn" value = "<?php echo $id_grupo;?>">
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