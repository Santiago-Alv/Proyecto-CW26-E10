<?php
    include './config_db.php';
    include '../Dynamics/validaciones.php';
    $usuario = "Angela";
    $numeroTrabajador = "452379";
    $contraseña = "lol";

    $contraseña = hasheaPassword($contraseña);

    $sql = "UPDATE profesor SET contraseña = '$contraseña' WHERE id_profesor = 312";

    $query = mysqli_query($conexion,$sql);


?>