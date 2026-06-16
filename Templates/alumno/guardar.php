<?php
    include 'config.php';
    if($_SERVER["REQUEST_METHOD"]== 'POST'){
        $recursos = $_POST["recursos"];
        $actividades = $_POST["actividades"];
        $temas = $_POST["temas"];

        $sql= "INSERT INTO formulario (pregunta_1, pregunta_2, pregunta_3)
            VALUES('$recursos', '$actividades', '$temas')"
        $query = mysqli_query($conexion, $sql);
    }
?>
