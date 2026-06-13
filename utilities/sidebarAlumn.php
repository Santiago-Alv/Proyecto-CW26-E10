<?php
    // IMPORTANTE: Si la vista donde se inserta el sidebar (de alumno) no requiere conexión, se debe
    //aun así poner el include con el config, para no causar problemas con las demas vistas, 
    //ya que en esta vista NO se puede poner el include, dado que se pueden dublicar los include
    //include '../../config/config_db.php';

  /*  $sql = "SELECT id_modulo FROM modulo";
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
        <nav>
            <ul>
                <li><a id="botonDuda" href="ForoDudas.php">Dudas al<br>profesor</a></li>
                <?php
                    for($cuentamod = 1; $cuentamod<=5; $cuentamod++)
                    {
                        echo "<li>";
                        echo "<details class = 'modulo' >";
                        echo "<summary>Modulo $cuentamod </summary>";
                        echo "<a href= 'EstadoModuloAlumno.php'>Estado</a>";
                        echo "<a href='#'>Recursos</a>";
                        echo "</details>";
                        echo "</li>";
                    }
                ?>
            </ul>
        </nav>
    </aside>