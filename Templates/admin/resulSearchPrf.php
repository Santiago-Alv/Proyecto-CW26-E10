<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
//
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados de Profesores</title>
    <link rel="stylesheet" href="../../Statics/Css/adminGraph.css">
</head>
<body>
    <?php include '../../utilities/navbar.php'; ?>

    <div class="main-layout">
        <?php include '../../utilities/sidebarAdmin.php'; ?>

        <main class="content">
            <div class="header-content">
                <h1>Profesores - Resultado de búsqueda</h1>
            </div>

            <div class="results-container">
                <?php
                include '../../config/config_db.php';
                $conexion = connect();
                $nombre_buscado = isset($_GET['nombre']) ? mysqli_real_escape_string($conexion, $_GET['nombre']) : '';
                $grupo_buscado = isset($_GET['grupo']) ? mysqli_real_escape_string($conexion, $_GET['grupo']) : '';
                $texto_busqueda = "Todos los profesores";
                //sanitizar y eso
                if ($nombre_buscado != '' && $grupo_buscado != '') {
                    $texto_busqueda = '"' . htmlspecialchars($nombre_buscado) . '" en Grupo: ' . htmlspecialchars($grupo_buscado);
                } elseif ($nombre_buscado != '') {
                    $texto_busqueda = '"' . htmlspecialchars($nombre_buscado) . '"';
                } elseif ($grupo_buscado != '') {
                    $texto_busqueda = 'Grupo: "' . htmlspecialchars($grupo_buscado) . '"';
                }
                ?>
                
                <p style="color: white; margin-bottom: 20px;">Resultados para: <?php echo $texto_busqueda; ?></p>
                
                <div class="selection-label">Seleccionar</div>
                
                <div class="results-list">
                    <?php
                    $id_profesor_por_grupo = 0;
                    if ($grupo_buscado != '') {
                        $sql_busca_id = "SELECT id_profesor FROM grupo WHERE nombre_grupo = '$grupo_buscado'";
                        $res_busca_id = mysqli_query($conexion, $sql_busca_id);
                        if ($res_busca_id && mysqli_num_rows($res_busca_id) > 0) {
                            $fila_id = mysqli_fetch_assoc($res_busca_id);
                            $id_profesor_por_grupo = $fila_id['id_profesor'];
                        }
                    }
                    $sql_profesor = "SELECT id_profesor, nombre_profesor FROM profesor WHERE 1=0";//otravez truco de OR
                    if ($nombre_buscado != '') {
                        $sql_profesor .= " OR nombre_profesor LIKE '%$nombre_buscado%'";
                    }
                    if ($id_profesor_por_grupo > 0) {
                        $sql_profesor .= " OR id_profesor = $id_profesor_por_grupo";
                    }
                    //todos
                    if ($nombre_buscado == '' && $grupo_buscado == '') {
                        $sql_profesor = "SELECT id_profesor, nombre_profesor FROM profesor";
                    }
                    $resultado_profesor = mysqli_query($conexion, $sql_profesor);
                    if ($resultado_profesor && mysqli_num_rows($resultado_profesor) > 0) {
                        while ($fila_profesor = mysqli_fetch_assoc($resultado_profesor)) {
                            $id_prof = $fila_profesor['id_profesor'];
                            $grupos_del_profesor = "";
                            $sql_grupo = "SELECT nombre_grupo FROM grupo WHERE id_profesor = '$id_prof'";
                            $resultado_grupo = mysqli_query($conexion, $sql_grupo);
                            if ($resultado_grupo && mysqli_num_rows($resultado_grupo) > 0) {
                                $lista_grupos = [];//multiples grupos
                                while ($fila_grupo = mysqli_fetch_assoc($resultado_grupo)) {
                                    $lista_grupos[] = $fila_grupo['nombre_grupo'];
                                }
                                $grupos_del_profesor = implode(", ", $lista_grupos);//pega los dos datos en string
                            } else {
                                $grupos_del_profesor = "Sin grupos asignados";
                            }
                            echo "<a href='profesores.php?id=" . $fila_profesor['id_profesor'] . "' class='result-item-link'>";//placeholder
                            echo "  <div class='result-card'>";
                            echo "      <span class='alumno-nombre'>" . htmlspecialchars($fila_profesor['nombre_profesor']) . "</span>";
                            echo "      <span class='alumno-grupo'>" . htmlspecialchars($grupos_del_profesor) . "</span>";
                            echo "  </div>";
                            echo "</a>";
                        }
                    } else {
                        echo "<p style='color: white; padding-left: 15px;'>No se encontraron profesores.</p>";
                    }
                    mysqli_close($conexion);
                    ?>
                </div>
            </div>
        </main>
    </div>
</body>
</html>