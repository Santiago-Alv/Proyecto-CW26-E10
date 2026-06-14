<?php
function generarpassword($longitud = 8) {
    $caracteres = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!#$%&*()-_=+';
    $max = strlen($caracteres) - 1;
    $password = '';
    
    for ($i = 0; $i < $longitud; $i++) {
        $indiceAleatorio = random_int(0, $max);
        $password .=$caracteres[$indiceAleatorio];
    }
    return $password;
}
echo generarpassword(8);
?>