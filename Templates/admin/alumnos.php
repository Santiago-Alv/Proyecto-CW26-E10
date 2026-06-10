<?php
    $nombre_buscado = "";
    $cuenta_buscada = "";
    $lista_resultados = array();

    
    if (isset($_GET['nombre']) || isset($_GET['cuenta'])) {
    
    $nombre_buscado = isset($_GET['nombre']) ? trim($_GET['nombre']) : "";
    $cuenta_buscada = isset($_GET['cuenta']) ? trim($_GET['cuenta']) : "";
    //noseque consulta noseque noseque fetch noseque
    }
    //PLACEHOLDER
    $nombre_admin = "Angela";
?>
<!--  ya desp incorporo el foreach y eso -->
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
                <h1>Alumno</h1>
                <h2>Juanito Juanito</h2>
            </div>
            <div class="acciones-perfil">
                <button class="btn-secundario">Ver resultado de formulario</button>
                <button class="btn-secundario">Modificar</button>
                <button class="btn-peligro">Eliminar</button>
            </div>
        </div>

        <div class="grid-informacion">
        
            <div class="tarjeta-datos">
                <p>Número de cuenta: 324489766</p>
                <p>Grupo 61D</p>
                <p>Modulo activo (Módulo 1)</p>
                <br>
                <p>Correo electrónico institucional</p>
                <p>Contraseña: 123Abc</p>
            </div>

            <div class="metricas-rapidas">
                <div class="metrica-box">
                    <div class="metrica-titulo">Asistencia total</div>
                    <div class="metrica-valor">88%</div>
                </div>
            
                <div class="metrica-box">
                    <div class="metrica-titulo">Calificación actual (ETE)</div>
                    <div class="metrica-valor">9</div>
                </div>
            </div>
        </div>

        <div class="seccion-estado">
            <h2 class="titulo-estado">Estado</h2>
            <table class="tabla-modulos">
                <thead>
                    <tr>
                        <th></th>
                        <th>Asistencia</th>
                        <th>Calificación</th>
                        <th>Ánimo</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="nombre-modulo">Modulo 1:</td>
                        <td>88%</td>
                        <td>9</td>
                        <td>feliz</td>
                    </tr>
                    <tr>
                        <td class="nombre-modulo">Modulo 2:</td>
                        <td>0%</td>
                        <td>11</td>
                        <td>depresion absoluta</td>
                    </tr>
                    <tr>
                        <td class="nombre-modulo">Modulo 3:</td>
                        <td>3%</td>
                        <td>3</td>
                        <td>tres</td>
                    </tr>
                    <tr>
                        <td class="nombre-modulo">Modulo 4:</td>
                        <td>90%</td>
                        <td>9</td>
                        <td>bloqueo emocional</td>
                    </tr>
                    <tr>
                        <td class="nombre-modulo">Modulo 5:</td>
                        <td>100%</td>
                        <td>10</td>
                        <td>felis</td>
                    </tr>
                </tbody>
            </table>
        </div>

    </main>