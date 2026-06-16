<?php
include '../../config/config_db.php';
//session_start();

// consulta db
    $id_duda=0;

     if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['idduda']))
    {
        $id_duda = $_POST['idduda'];

        $sql = "DELETE FROM duda WHERE id_duda = $id_duda";
        $query = mysqli_query($conexion, $sql); 

        header("Location: homeProfesor.php");
        exit();
    }
    else
    {
       echo "error";
    }  

?>

