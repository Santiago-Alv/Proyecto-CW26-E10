<?php
    include './config_db.php';
    include '../Dynamics/validaciones.php';
    $usuario = "Angela";
    $numeroTrabajador = "452379";
    $contraseña = "lol";

    $contraseña = hasheaPassword($contraseña);

    $sql = "INSERT INTO profesor (nombre_administrador,numero_trabajador,contraseña) VALUES ('$usuario','$numeroTrabajador','$contraseña')";

    $query = mysqli_query($conexion,$sql);


?>