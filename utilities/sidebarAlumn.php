<?php
 /*
    include '../../config/config_db.php';

   $sql = "SELECT id_modulo FROM modulo";
    $query = mysqli_query($conexion, $sql); 

    $num_modulo = array();

    if($query)
    {
        while($fila = mysqli_fetch_assoc($query))
        {   
            $num_modulo = $fila["id_modulo"];
            var_dump($num_modulo[$x]);
        }
    }
*/
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
                                echo "<a href='#'>Recursos</a>";
                            echo "</div>";
                        echo "</details>";
                        echo "</li>";
                    }
                ?>
            </ul>
        </nav>
    </aside>