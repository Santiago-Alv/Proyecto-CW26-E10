<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados de Búsqueda</title>
    <link rel="stylesheet" href="../../Statics/Css/adminGraph.css">
</head>
<body>
    <?php include '../../utilities/navbar.php'; ?>

    <div class="main-layout">
        <?php include '../../utilities/sidebarAdmin.php'; ?>

        <main class="content">
            <div class="header-content">
                <h1>Resultados de Búsqueda</h1>
            </div>

            <div class="results-container">
                <?php
                    include '../../config/config_db.php';
                    $conexion = connect();

                    // datos y sancitizar y eso
                    $nombre_buscado = isset($_GET['nombre']) ? mysqli_real_escape_string($conexion, $_GET['nombre']) : '';
                    $cuenta_buscada = isset($_GET['cuenta']) ? mysqli_real_escape_string($conexion, $_GET['cuenta']) : '';
                    $texto_busqueda = "Todos los alumnos";//default porsi busca por noctaonada
                    if ($nombre_buscado != '') {
                    $texto_busqueda = '"' . htmlspecialchars($nombre_buscado) . '"';
                    } elseif ($cuenta_buscada != '') {
                    $texto_busqueda = 'Cuenta: "' . htmlspecialchars($cuenta_buscada) . '"';
                    }
                ?>
                <p style="color: white; margin-bottom: 2vh">Resultados para: <?php echo $texto_busqueda; ?></p>
                <div class="result-list">
                    <?php
                    $sql_alumno = "SELECT id_alumno, nombre, id_grupo FROM alumno WHERE 1=0";
                    // 1=0 para que funcione el truco del OR
                    //daba sintax error la respetable query, no se puede OR dsps de WHERE
                    //1=0 SIEMPRE sera falso, entonces no necesita que se cumpla todo
                    //EN RESUMEN, FALSO PARA QUE WHERE SE SALTE Y PASE AL OR
                    if ($nombre_buscado != '') {
                        $sql_alumno .= " OR nombre LIKE '%$nombre_buscado%'";
                    }
                    if ($cuenta_buscada != '') {
                        $sql_alumno .= " OR nocta = '$cuenta_buscada'";
                    }
                    if ($nombre_buscado == '' && $cuenta_buscada == '') {
                        $sql_alumno = "SELECT id_alumno, nombre, id_grupo FROM alumno"; //todos los alumnos
                    }
                    $resultado_alumno = mysqli_query($conexion, $sql_alumno);
                    if ($resultado_alumno && mysqli_num_rows($resultado_alumno) > 0) { //si hay resultados
                        while ($fila_alumno = mysqli_fetch_assoc($resultado_alumno)) {
                            $id_grupo_alumno = $fila_alumno['id_grupo'];
                            $nombre_grupo_final = "Sin Grupo"; //placeholder super chido pa q avise si no tiene grupo o q fallo la consulta xddd
                            if (!empty($id_grupo_alumno) && is_numeric($id_grupo_alumno)) { //se rompia aveces por el id_grupo null o vacio QUE NO SE PQ LO RECIBIA NULL PERO LO RECIBIA JAJJAJA
                                $sql_grupo = "SELECT nombre_grupo FROM grupo WHERE id_grupo = " . intval($id_grupo_alumno);
                                $resultado_grupo = mysqli_query($conexion, $sql_grupo);

                                if ($resultado_grupo && mysqli_num_rows($resultado_grupo) > 0) {
                                    $fila_grupo = mysqli_fetch_assoc($resultado_grupo);
                                    $nombre_grupo_final = $fila_grupo['nombre_grupo'];
                                }
                            }
                            echo "<a href='alumnos.php?id=" . $fila_alumno['id_alumno'] . "' class='result-item-link'>";//AQUI VA EL REDIRECCIONAMIENTO SANTI O QN SEA Q ANDABA HACIENDO LA PANTALLA DE ALUM
                            echo "  <div class='result-card'>";
                            echo "      <span class='alumno-nombre'>" . htmlspecialchars($fila_alumno['nombre']) . "</span>";
                            echo "      <span class='alumno-grupo'>" . htmlspecialchars($nombre_grupo_final) . "</span>";
                            echo "  </div>";
                            echo "</a>";
                        }
                    } else {
                        echo '<p style="color: white; padding-left: 15px;">No se encontraron alumnos.</p>';
                    }

                    mysqli_close($conexion);
                    ?>
                </div>
            </div>
        </main>
    </div>
</body>
</html>