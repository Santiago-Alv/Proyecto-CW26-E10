<?php
    include './config_db.php';
    include '../Dynamics/validaciones.php';
    $usuario = "Angela";
    $numeroTrabajador = "452379";
    $contraseña = "lol2";

    $contraseña = hash("sha256",$contraseña);

    $sql = "UPDATE profesor SET contraseña = '$contraseña' WHERE id_profesor = 4";

    $query = mysqli_query($conexion,$sql);


?>