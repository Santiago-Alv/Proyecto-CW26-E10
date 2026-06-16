<?php

// include '../config/config_db.php'; 

$sql = "SELECT id_grupo, nombre_grupo FROM grupo WHERE id_profesor = ".$_SESSION['id_profesor']."";
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
            foreach($grupos as $grupoSide) {
                $id_grupoSide = $grupoSide['id_grupo'];
                $nombre_grupoSide = htmlspecialchars($grupoSide['nombre_grupo']);
                echo "<details class='grupo-acordeon'>";

                echo "<summary class='btn-sidebar summary-grupo'>Grupo $nombre_grupoSide</summary>";
                echo "<div class='enlaces-grupo'>";
                // get
                echo "<a href='infoGrupo.php?id_grupo=$id_grupoSide' class='btn-sublink'>Info</a>";
                echo "<a href='ForoDudaProfe.php?id_grupo=$id_grupoSide' class='btn-sublink'>Dudas</a>";
                echo "<a href='recursosProfesor.php?id_grupo=$id_grupoSide' class='btn-sublink'>Recursos</a>";
                echo "</div>";
                
                echo "</details>";
            }
        } else {
            echo "<p style='color: #cbd5e1; text-align: center; font-size: 14px;'>Sin grupos asignados</p>";
        }
        ?>
    </nav>
</aside>
