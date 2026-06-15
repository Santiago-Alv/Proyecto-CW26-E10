<?php   


   function sanitizarEntrada($conexion, $datos) {

        // Quitamos espacios en blanco vacíos al inicio y al final
        $datos = trim($datos);

        // Si meten "--", lo cambiamos por "".
        $datos = str_replace('--', '', $datos);

        // Si meten "/*", lo cambiamos por "".
        $datos = str_replace('/*', '', $datos);
        
        // Si meten "*/", lo cambiamos por "".
        $datos = str_replace('*/', '', $datos);

        // Límite de tamaño (Protección contra textos gigantes)
        // Corta el texto a un máximo de 50 caracteres para no saturar la BD
        $datos = substr($datos, 0, 50);

        // Busca comillas simples (') o dobles (") y les pone una diagonal inversa (\) antes.
        // Así la base de datos sabe que es parte del nombre y NO un comando SQL.
        $datosLimpio = mysqli_real_escape_string($conexion, $datos);
        
        return $datosLimpio;
    }


    function buscarUsuario($conexion,$usuario){
        //FIND IF ALUMNO
        $sql = "SELECT nocta FROM alumno";
        $query = mysqli_query($conexion,$sql);
        if($query){
            while($fila = mysqli_fetch_assoc($query)){
                if($fila['nocta'] == $usuario){
                    return 'alumno';
                }
            }

        }
        //FIND IF PROFE
        $sql = "SELECT numero_trabajador FROM profesor";
        $query = mysqli_query($conexion,$sql);
        if($query){
            while($fila = mysqli_fetch_assoc($query)){
                if($fila['numero_trabajador'] == $usuario){
                    return 'profesor';
                }
            }
        }
        
        //FIND IF ADMINISTRADOR
        $sql = "SELECT numero_trabajador FROM administrador";
        $query = mysqli_query($conexion,$sql);
        if($query){
            while($fila = mysqli_fetch_assoc($query)){
                if($fila['numero_trabajador'] == $usuario){
                    return 'administrador';
                }
            }
        }
        return;
    }

    function hasheaPassword($pass){

        //Generamos el hash
        $passwordHasheada = password_hash($pass, PASSWORD_DEFAULT);

        return $passwordHasheada;
    }
?>