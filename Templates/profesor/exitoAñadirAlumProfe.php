<?php

//session_start();


// consulta db
    include '../../config/config_db.php';

    //Insertar datos a la base de datos si no se repite
    $num_cuenta = $_GET["numc"];
    $sql = "SELECT contraseña FROM alumno WHERE nocta = '$num_cuenta'";
    $query = mysqli_query($conexion, $sql); 
    $contraseña = array();
    if($query)
    {
        while($fila = mysqli_fetch_assoc($query))
        {   
            $contraseña[]= $fila;
            //var_dump($fila);
        }
    }
    if(count($contraseña)>0)
    {
        foreach($contraseña as $contra)
        {
            $password = $contra["contraseña"];
        }
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
    <title>Gestión de Alumnos</title>
    <link rel="stylesheet" href="../../Statics/Css/profeGraph.css">
    <link rel="stylesheet" href="../../Statics/Css/agregarAlumProfe.css">
</head>
<body>

    <?php include '../../utilities/navbarProfe.php'; ?>

    <div class="main-layout">
        <?php include '../../utilities/sidebarProfe.php'; ?>

        <main class="content">
            <div class="header-content">
                <h1>Creación de alumno exitosa</h1>
            </div>
            <div class="search-container">
                <?php
                    
                    echo "<div class='search-title'>";
                        echo "<span>Sus datos son los siguientes:</span>";
                    echo "</div>";
                    echo "<form action='agregAlumProfe.php' class='aceptagregar-form'>";
                        echo "<p>Número de cuenta: $num_cuenta</p>";
                        echo "<p>Contraseña: $password</p>";
                    
                        echo "<button type='submit' class='btn-aceptagregar'>Aceptar</button>";
                    echo "</form>";
                ?>
            </div>
        </main>
    </div>

</body>
</html>