<?php

    $sql = "SELECT nombre_grupo FROM grupo WHERE id_profesor = 3";
    $query = mysqli_query($conexion, $sql); 
    $nomb_grupos = array();
    if($query)
    {
        while($fila = mysqli_fetch_assoc($query))
        {   
            $nomb_grupos[]= $fila;
        }
    }
?>

    <aside class="sidebar">
        <nav>
            <ul>
                <li>
                <?php 
                    if(count($nomb_grupos)>0)
                    {
                        foreach($nomb_grupos as $nomb_grup)
                        {
                            $nombregrupo = $nomb_grup["nombre_grupo"];
                            echo "<details class = 'grupos'>";
                            echo "<summary> $nombregrupo</summary>";
                            echo "<a href='#'>Info</a>";
                            echo "<a href='#'>Dudas</a>";
                            echo "<a href='#'>Recursos</a>";
                            echo "</details>";
                        }
                    } 
                ?>
                </li>
            </ul>
        </nav>
    </aside>