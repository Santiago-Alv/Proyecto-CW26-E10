<?php
include '../config/config_bd.php';
include '../Dynamics/validaciones.php'

session_start();

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["userLog"]) && isset($_POST["passwordLog"])){

    $usuario = sanitizarEntrada($conexion,$_POST['userLog']);

    $sql = "SELECT nocta,password FROM ";

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
                    <form action="index.php" method="post" class="loginForm">
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