<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados de Búsqueda</title>
    <link rel="stylesheet" href="../../Statics/Css/adminGraph.css">
</head>
<body>
    <?php include '../../utilities/navbarAdmin.php'; ?>

    <div class="main-layout">
        <?php include '../../utilities/sidebarAdmin.php'; ?>

        <main class="content">
            <div class="header-content">
                <h1>Resultados de Búsqueda</h1>
            </div>

            <div class="results-container">
                <p>Resultados para: "Nombre del alumno"</p>
                <div class="result-list">
                    <?php
                    include '../../config/config_bd.php';
                    $conexion = connect();
                    // sanitizar y eso
                    $nombre_buscado = isset($_GET['nombre']) ? mysqli_real_escape_string($conexion, $_GET['nombre']) : '';
                    $cuenta_buscada = isset($_GET['cuenta']) ? mysqli_real_escape_string($conexion, $_GET['cuenta']) : '';

                    $sql = "SELECT a.id_alumno, a.nombre, g.nombre_grupo 
                            FROM alumno a
                            INNER JOIN grupo g ON a.id_grupo = g.id_grupo 
                            WHERE 1=0"; // 1=0 para que funcione el truco del OR
                            //daba sintax error la perrita, no se puede OR dsps de WHERE
                            //1=0 SIEMPRE sera falso, entonces no necesita que se cumpla todo
                            //ni de pedo lo cerebre yo solo, digamos que me inspire de stackoverflow
                            //EN RESUMEN, FALSO PARA QUE WHERE SE SALTE Y PASE AL OR
                    if ($nombre_buscado != '') {
                        // Si escribió nombre, busca por nombre
                        $sql .= " OR a.nombre LIKE '%$nombre_buscado%'";
                    }              

                    if ($cuenta_buscada != '') {
                        // Si escribió cuenta, busca por cuenta
                        $sql .= " OR a.nocta = '$cuenta_buscada'";
                    }

                    // podriamos poner esto en otro boton para mostrar todo jejeje
                    if ($nombre_buscado == '' && $cuenta_buscada == '') {
                        $sql = "SELECT a.id_alumno, a.nombre, g.nombre_grupo 
                        FROM alumno a
                        INNER JOIN grupo g ON a.id_grupo = g.id_grupo";
                    }

                    // Ejecutamos la consulta final
                    $resultado = mysqli_query($conexion, $sql);

                    if ($resultado && mysqli_num_rows($resultado) > 0) {
                        while ($fila = mysqli_fetch_assoc($resultado)) {
                            echo '<a href="alumnos.php?id=' . $fila['id_alumno'] . '" class="result-item-link">';
                            echo '  <div class="result-card">';
                            echo '      <span class="alumno-nombre">' . htmlspecialchars($fila['nombre']) . '</span>';
                            echo '      <span class="alumno-grupo">' . htmlspecialchars($fila['nombre_grupo']) . '</span>';
                            echo '  </div>';
                            echo '</a>';
                        }
                    } else {
                        echo '<p style="color: #fff; padding-left: 15px;">No se encontraron alumnos.</p>';
                    }
                    mysqli_close($conexion);
                    ?>
                </div>
            </div>
        </main>
    </div>
</body>
</html>