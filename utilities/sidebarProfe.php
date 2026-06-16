<?php

// include '../config/config_db.php'; 

$sql = "SELECT id_grupo, nombre_grupo FROM grupo WHERE id_profesor = 3";
$query = mysqli_query($conexion, $sql); 
$grupos = array();

if($query) {
    while($fila = mysqli_fetch_assoc($query)) {   
        $grupos[] = $fila;
    }
}
?>

    <aside class="sidebar-izquierdo">
    <nav class="sidebar-menu">
        <?php 
        if(count($grupos) > 0) {
            foreach($grupos as $grupo) {
                $id_grupo = $grupo['id_grupo'];
                $nombre_grupo = htmlspecialchars($grupo['nombre_grupo']);
                echo "<details class='grupo-acordeon'>";

                echo "<summary class='btn-sidebar summary-grupo'>Grupo $nombre_grupo</summary>";
                echo "<div class='enlaces-grupo'>";
                // get
                echo "<a href='infoGrupo.php?id_grupo=$id_grupo' class='btn-sublink'>Info</a>";
                echo "<a href='ForoDudaProfe.php?id_grupo=$id_grupo' class='btn-sublink'>Dudas</a>";
                echo "<a href='recursosProfesor.php?id_grupo=$id_grupo' class='btn-sublink'>Recursos</a>";
                echo "</div>";
                
                echo "</details>";
            }
        } else {
            echo "<p style='color: #cbd5e1; text-align: center; font-size: 14px;'>Sin grupos asignados</p>";
        }
        ?>
    </nav>
</aside>
