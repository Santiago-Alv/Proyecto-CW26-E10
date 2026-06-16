<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();
include '../config/config_db.php';
$conexion = connect();


$mensaje = "";
$tipo_alerta = ""; //color del mensaje si es exito o error


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   //sanitizar y eso
   $nombre = mysqli_real_escape_string($conexion, $_POST['userSign']);
   $correo = mysqli_real_escape_string($conexion, $_POST['emailSign']);
   $num_trabajador = mysqli_real_escape_string($conexion, $_POST['numTrabajador']);
   $password_raw = $_POST['passwordSign'];
   //validar que no existan
   $sql_check = "SELECT id_administrador FROM administrador WHERE correo = '$correo' OR numero_trabajador = '$num_trabajador'";
   $res_check = mysqli_query($conexion, $sql_check);
   if ($res_check && mysqli_num_rows($res_check) > 0) {
       $mensaje = "El correo o el número de trabajador ya están registrados.";
       $tipo_alerta = "error";
   } else {
       $password_hash = password_hash($password_raw, PASSWORD_DEFAULT);


       // Insertamos en la tabla administrador
       $sql_insert = "INSERT INTO administrador (nombre_administrador, numero_trabajador, correo, contraseña)
                      VALUES ('$nombre', '$num_trabajador', '$correo', '$password_hash')";


       if (mysqli_query($conexion, $sql_insert)) {
           $mensaje = "¡Administrador registrado con éxito! Ya puedes iniciar sesión.";
           $tipo_alerta = "exito";
       } else {
           $mensaje = "Error al registrar en la base de datos: " . mysqli_error($conexion); //devuelve el error especifico
           $tipo_alerta = "error";
       }
   }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../Statics/Css/signupGraph.css">
   <title>Registrarse-nodesErTE</title>
</head>
<body>
<main>
   <section class="welcomeContainer">
       <h1>¡Regístrate a NodesErTE!</h1>
   </section>


   <section class="generalContainer">
       <div class="articleSignup">
           <div class="avatarIcon">
               <img class="icon" src="../Statics/img/signup-icon.png" alt="Avatar">
           </div>


           <?php if ($mensaje != ""): ?>
               <div style="padding: 10px; margin-bottom: 15px; border-radius: 5px; text-align: center; font-weight: bold;
                           background-color: <?php echo ($tipo_alerta == 'exito') ? '#2ecc71' : '#e74c3c'; //si es exito verde si no rojo xd?>;
                           color: white;">
                   <?php echo $mensaje;?>
               </div>
           <?php endif; ?>


           <form class="signupForm" method="POST" action="">
               <div class="inputContainer">
                  
                   <label for="userSign" class="input">
                       <input type="text" id="userSign" name="userSign" minlength="3" maxlength="50" placeholder="Nombre de Usuario" required>
                   </label>
                  
                   <label for="numTrabajador" class="input">
                       <input type="text" id="numTrabajador" name="numTrabajador" placeholder="Número de Trabajador" required>
                   </label>


                   <label for="emailSign" class="input">
                       <input type="email" id="emailSign" name="emailSign" placeholder="Correo Electrónico" required>
                   </label>


                   <label for="passwordSign" class="input">
                       <input type="password" id="passwordSign" name="passwordSign" minlength="3" maxlength="15" placeholder="Contraseña" required>
                   </label>


               </div>
               <h2>¡NO OLVIDES TU CONTRASEÑA!</h2>
               <br>
               <button type="submit">REGISTRARSE</button>
           </form>
           <br>
           <h4>¿Ya tienes una cuenta?, <a id="loginRelocation" href="../index.php">Inicia sesión aquí.</a></h4>
       </div>
   </section>
</main>
</body>
</html>
