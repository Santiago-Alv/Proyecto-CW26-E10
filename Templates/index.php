<?php
session_start();

//include '../config/config_bd.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //sanitizar xd
    $correo = mysqli_real_escape_string($conexion, trim($_POST['correo']));
    $password = mysqli_real_escape_string($conexion, trim($_POST['password']));

    $sql = "SELECT id_usuario, nombre, tipo, password FROM usuarios WHERE correo = '$correo'";
    
    $resultado_query = mysqli_query($conexion, $sql);

    if ($resultado_query) {
        $usuario = mysqli_fetch_assoc($resultado_query);
        if ($usuario && $password === $usuario['password']) {
            $_SESSION['id_usuario'] = $usuario['id_usuario'];
            $_SESSION['nombre']     = $usuario['nombre'];
            $_SESSION['tipo']       = $usuario['tipo']; 
            if ($_SESSION['tipo'] === 'profesor') {
                header("Location: profesorGraph.php");
            } else {
                header("Location: ../../index.html");
            }
            exit();
            
        } else {
            $error = "Correo o contraseña incorrectos.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../Statics/Css/indexGraph.css">
        <title>nodeserte</title>
    </head>
    <body>
        <main>
            <!--Sección superior-->
            <section class="welcomeContainer">
                <h1>¡Bienvenido a NodesErTE!</h1> <!--Titulo de Bienvenida-->
            </section>

            <section class="generalContainer"> <!--Sección inferior-->
                <article class="articleIcon"><img  class="icon" src="../Statics/img/login-icon.jpg" alt="Logo"></article> <!--Articulo para el logo-->

                </article>

                <article class="articleLogin"> <!--Articulo para el apartado de bienvenida-->
                    <!--Formulario para el inicio de sesion-->
                    <form class="loginForm">
                        <h1>Iniciar Sesión</h1>
                        <!--Apartado para ingresar usuario-->
                        <div class="inputContainer">
                            <label for="userLog" class="input">
                                <input type="text" id="userLog" name="userLog" minlength="3" maxlength="15" placeholder="Nombre de Usuario" required>
                            </label>
                        <!--Apartado para ingresar contraseña-->
                            <label for="passwordLog" class="input">  
                                <input type="password" id="passwordLog" name="passwordLog" minlength="3" maxlength="15" placeholder="Contraseña" required>
                            </label>
                        </div>
                        <button type="submit">INGRESAR</button>
                        <article>No tienes una cuenta?, <a id="registerRelocation" href="signup.html">Registrate aquí.</a></article>
                    </form>
                </article>
            </section>

        </main>
    </body>
</html>