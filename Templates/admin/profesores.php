<?php
    include '../../config/config_bd.php';

    

    
    if(isset($_GET['nombre']) && isset($_GET['cuenta'])){
        $nombreBuscado = $_GET['nombre'];
        $noctaBuscado = $_GET['cuenta'];

        $sql = "SELECT * FROM profesor WHERE nombre LIKE '%" . $nombreBuscado . "%' OR nocta= '$noctaBuscado'";
        $resultado_query = mysqli_query($conexion, $sql);

        if($resultado_query && mysqli_num_rows($resultado_query) > 0){
            $fila = mysqli_fetch_assoc($resultado_query);
            $id_profesor = $fila["id_profesor"];
            $nombreProfesor = $fila['nombre'];
            $noctaProfesor = $fila['nocta'];

            if(isset($fila["correo"])) $correoProfesor = $fila["correo"];
            if(isset($fila["contrasena"])) $contrasenaProfesor = $fila["contrasena"];
        }

        if(!empty($id_profesor)){
            $sql2 ="SELECT nombre_grupo, modulo_activo FROM grupo WHERE id_profesor = $id_profesor";
            $query2 = mysqli_query($conexion, $sql2);

            if($query2){
                while($fila2 = mysqli_fetch_assoc($query2)){
                    $listaGrupos[] = $fila2["nombre_grupo"];
                    $modulo_activo = $fila2["modulo_activo"];
                }
            }
        }
    }

?>
<!-- poner esa madre del forich -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Profesores</title>
    <link rel="stylesheet" href="../../Statics/Css/adminGraph.css">
</head>
<body>

    <?php include '../../utilities/navbarAdmin.php'; ?>

    <div class="main-layout">
        <?php include '../../utilities/sidebarAdmin.php'; ?>

<main class="content">
    <div class="header-perfil">
        <div class="titulos-perfil">
            <h1>Profesor</h1>
            <h2><?php echo htmlspecialchars($nombreProfesor); ?></h2>
        </div>
        <div class="acciones-perfil">
            <button class="btn-secundario">Ver resultado de formulario</button>
            <button class="btn-secundario">Modificar</button>
            <button class="btn-peligro">Eliminar</button>
        </div>
    </div>

    <div class="grid-informacion">
        <div class="tarjeta-datos tarjeta-profesor">
            <p>Número de cuenta: <?php echo htmlspecialchars($noctaProfesor); ?></p>
            
            <div class="grupos-profesor">
                <p>Grupos que tiene:</p>
                <ul>
                    <?php
                    if(!empty($listaGrupos)){
                        foreach($listaGrupos as $grupo){
                            echo "<li>" . htmlspecialchars($grupo) . "</li>";
                        }
                    } else {
                        echo "<li>Sin grupos asignados</li>";
                    }
                    ?>
                </ul>
            </div>
            <p>Modulo activo (Módulo: <?php echo htmlspecialchars($modulo_activo); ?>)</p>
            <p>Correo electrónico intitucional: <?php echo htmlspecialchars($correoProfesor); ?></p>
            <p>Contraseña: <?php echo htmlspecialchars($contrasenaProfesor); ?></p>
        </div>
        <div class="espacio-vacioxd"></div>
    </div>
</main>