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
?>