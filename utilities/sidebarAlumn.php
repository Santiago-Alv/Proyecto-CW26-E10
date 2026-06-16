<?php

$id_grupo_alumno = isset($_SESSION['id_grupo']) ? (int)$_SESSION['id_grupo'] : 1;//sinohay ps el 1 pq el get no puede quedar vacio
?>

    <aside class="sidebar">
        <nav class = "sidebar-menu">
            <ul>
                <li><a id="botonDuda" href="ForoDudas.php">Dudas al<br>profesor</a></li>
                <?php
                    for($cuentamod = 1; $cuentamod<=5; $cuentamod++)
                    {
                        echo "<li>";
                        echo "<details class = 'modulo' >";
                        echo "<summary class='btn-sidebar'>Modulo $cuentamod </summary>";
                            echo "<div class='enlaces-grupo'>";
                                echo "<a href= 'EstadoModuloAlumno.php?numMod= $cuentamod'>Estado</a>";
                                echo "<a href='recursosAlumno.php?id_grupo=$id_grupo_alumno&id_modulo=$cuentamod'>Recursos</a>";
                            echo "</div>";
                        echo "</details>";
                        echo "</li>";
                    }
                ?>
            </ul>
        </nav>
    </aside>
