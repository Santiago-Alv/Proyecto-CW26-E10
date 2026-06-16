<?php
include '../../config/config_db.php';
//session_start();

// consulta db

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nombre']) && isset($_POST['trabajador']))
    {
        $nombre_profe = $_POST['nombre'];
        $num_trabajador = $_POST['trabajador'];
                        
        var_dump($num_trabajador);
        var_dump($nombre_profe);

        //Consultar si ya existe usuario profesor con ese numero de cuenta
        $sql = "SELECT EXISTS (SELECT 1 FROM profesores WHERE no_trabajador = ?)";
        $stmt = mysqli_prepare($conexion, $sql); 
        mysqli_stmt_bind_param($stmt, "i", $num_trabajador);//vincula variable con el "?"
        mysqli_stmt_execute($stmt);//empezar busqueda
        mysqli_stmt_bind_result($stmt, $resultado);//obtener respuesta con una variable
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);

        // Evaluar: si resultado es 1 el profesor ya existe
        if ($resultado == 1) 
        {
            header("Location: repetidoAñadirProf.php");
            exit();
        } 
        else {
            //Insertar datos a la base de datos si no se repite
            $sql2 = "INSERT INTO profesores (nombre, no_trabajador, contrasenia) 
                VALUES ('$nombre_profe', '$num_trabajador', '$contraseña_aleatoria')";
            $query = mysqli_query($conexion, $sql2); 
            
            header("Location: exitoAñadirProf.php?numt=".urlencode($num_trabajador));//lleva variable de numero de trabajador
            exit();
        }
    }
    else
    {
       echo "error";
    }  

?>
