<?php
    $nombre_buscado = "";
    $cuenta_buscada = "";
    $lista_resultados = array();

    
    if (isset($_GET['nombre']) || isset($_GET['cuenta'])) {
    
    $nombre_buscado = isset($_GET['nombre']) ? trim($_GET['nombre']) : "";
    $cuenta_buscada = isset($_GET['cuenta']) ? trim($_GET['cuenta']) : "";
    //noseque consulta noseque noseque fetch noseque
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

    <?php include '../../utilities/navbar.php'; ?>

    <div class="main-layout">
        <?php include '../../utilities/sidebarAdmin.php'; ?>

<main class="content">
    <div class="header-perfil">
        <div class="titulos-perfil">
            <h1>Profesor</h1>
            <h2>Jirafales</h2>
        </div>
        <div class="acciones-perfil">
            <button class="btn-secundario">Ver resultado de formulario</button>
            <button class="btn-secundario">Modificar</button>
            <button class="btn-peligro">Eliminar</button>
        </div>
    </div>

    <div class="grid-informacion">
        <div class="tarjeta-datos tarjeta-profesor">
            <p>Número de cuenta: 324489766</p>
            
            <div class="grupos-profesor">
                <p>Grupos que tiene:</p>
                <ul>
                    <li>61D</li>
                    <li>61B</li>
                </ul>
            </div>
            <p>Modulo activo (Módulo 1)</p>
            <p>Correo electrónico intitucional</p>
            <p>Contraseña: 321Hola</p>
        </div>
        <div class="espacio-vacioxd"></div>
    </div>
</main>