<?php
include '../../config/config_db.php';
include '../../Dynamics/contrasenia.php';
//session_start();

// consulta db
    $contraseña = "";

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nombre']) && isset($_POST['cuenta']) && isset($_POST['grupoalumn']))
    {
        $nombre_alum = $_POST['nombre'];
        $num_cuenta = $_POST['cuenta'];
        $grupo_select = $_POST['grupoalumn'];
                        
        var_dump($num_cuenta);
        var_dump($nombre_alum);
        var_dump($grupo_select);

        //Consultar si ya existe usuario alumno con ese numero de cuenta
        $sql = "SELECT EXISTS (SELECT 1 FROM alumno WHERE nocta = ?)";
        $stmt = mysqli_prepare($conexion, $sql); 
        mysqli_stmt_bind_param($stmt, "i", $num_cuenta);//vincula variable con el "?"
        mysqli_stmt_execute($stmt);//empezar busqueda
        mysqli_stmt_bind_result($stmt, $resultado);//obtener respuesta con una variable
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);

        // Evaluar: si resultado es 1 el alumno ya existe
        if ($resultado == 1) 
        {
            header("Location: repetidoAñadirAlum.php");
            exit();
        } 
        else {
            //Insertar datos a la base de datos si no se repite
            $contraseña=generarpassword(4);
            $contrasena_hasheada = hash("sha256", $contraseña);

            $sql2 = "INSERT INTO alumno (nombre, nocta, id_grupo, apell_pat_alum, contraseña)
                VALUES ('$nombre_alum', '$num_cuenta', $grupo_select, 'Nohaycampo', '" . $contrasena_hasheada . "')";
            $query = mysqli_query($conexion, $sql2); 
            
            header("Location: exitoAñadirAlum.php?numc=".urlencode($num_cuenta));//lleva variable de numero de cuenta
            exit();
        }
    }
    else
    {
       echo "error";
    }  

?>

