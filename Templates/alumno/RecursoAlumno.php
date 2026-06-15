<?php
//ini_set('display_errors', 1);
//error_reporting(E_ALL);
session_start();
//include '../../config/config_db.php'; 
//$conexion = connect();
//ejemplo(NO CONECTADA A BD todavía)
if (isset($_GET['id_grupo'])) {
    $id_grupo_actual = $_GET['id_grupo'];
} else {
    $id_grupo_actual = 61;
}

$recursos_prueba = [
    [
        'id_recurso' => 1,
        'nombre_recurso' => 'UN MEME JOVENES',
        'descripcion' => 'un momaso que vi en los feisbuc',
        'url_imagen' => 'meme.png',
        'url_recurso' => 'nose me lo robe'
    ],
    [
        'id_recurso' => 2,
        'nombre_recurso' => 'IMPORTANTE PARA RREGLOS JOVENES',
        'descripcion' => 'PARA LOS QUE ANDABAN JUGANDO ROBLOX',
        'url_imagen' => 'meme.png',
        'url_recurso' => 'https://google.com'
    ]
];
$nombre_alumn = "Panchito";
$grupo_alumn = "61D";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recursos Profesor</title>
    <link rel="stylesheet" href="../../Statics/Css/AlumGraph.css">
    <link rel="stylesheet" href="../../Statics/Css/subirRecurso.css">
</head>
<body>
    <?php include '../../utilities/navbarAlumno.php'; ?>
    <div class="main-layout">
        <?php 
        $pagina_activa = 'recursos'; 
        include '../../utilities/sidebarAlumno.php'; 
        ?>
        <main class="content view-recursos">
            <div class="recursos-container">
                <div class="tabs-superiores">
                    <div class="tab-activo">RECURSOS</div>
                </div>
                <div class="lista-recursos">
                    <?php
                    if (!empty($recursos_prueba)){
                        foreach ($recursos_prueba as $recurso) {
                        ?>
                            <div class="tarjeta-recurso-c">
                                <div class="imagen-recurso-c">
                                <?php
                                if ($recurso['url_imagen'] != '' && $recurso['url_imagen'] !== 'temp') {
                                    $ruta_imagen = "../../Statics/img/recursos/" . $recurso['url_imagen'];
                                    echo "<img src='$ruta_imagen' alt='Imagen del curso' class='img-tarjeta'>";
                                } else {
                                    echo "<div class='sin-imagen'>Sin Imagen</div>";
                                }
                                ?>
                                </div>
                                <div class="contenido-tarjeta-derecha">
                                    <div class="tarjeta-header">
                                        <div class="textos-tarjeta">
                                            <h3><?php echo strtoupper($recurso['nombre_recurso']); ?></h3>
                                            <p>(<?php $recurso['descripcion']; ?>)</p>
                                        </div>
                                    
                                        <div class="botones-tarjeta">
                                            
                                                <a href="../../Statics/img/recursos/<?php echo $recurso['url_imagen']; ?>" target="_blank" class="btn-ver">
                                                    Ver imagen
                                                </a><!-- blank pa q abra otra pestania -->
                                            <!-- la solucion q se me ocurrio, cerrar el if manual pq no se cerraba normal-->
                                        </div>
                                    </div>
                                    <div class="caja-url">
                                        <?php
                                        $url = $recurso['url_recurso'];
                                        if (substr($url, 0, 4) == "http") {
                                            echo "<a href= '$url' target='_blanck' style='color: #1d3557; text-decoration: underline; font-weight: bold;'>$url</a>";
                                        } else {
                                            echo $url;
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        <?php //este php es como el tomate de tf2, no se pq si lo quito se rompe todo XDDD
                        }
                    } else {
                        echo "<p style='color: #ffffff;'>Aún no hay recursos asignados a este grupo. ¡Agrega uno para empezar!</p>";
                    }
                    ?>    
                </div>
            </div>
        </main>
    </div>
</body>
</html>