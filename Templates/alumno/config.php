<?php
    const DBHOST = "localhost";
    const DBUSER = "root";
    const PASSWORD = "";
    const DB = "nodeserte_14-06-26";
    
    function connect()
    {
        $conexion = mysqli_connect(DBHOST, DBUSER, PASSWORD, DB);
        return $conexion;
    }
    $conexion = connect();
?>