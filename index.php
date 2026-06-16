<?php
    include './config/config_db.php';
    include './Dynamics/validaciones.php';
    
    session_start();

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["userLog"]) && isset($_POST["passwordLog"])){

        $usuario = sanitizarEntrada($conexion,$_POST['userLog']);
        $password = $_POST["passwordLog"];
        $tipoUsuario = buscarUsuario($conexion,$usuario);

        $sql = "SELECT * FROM $tipoUsuario WHERE $usuario";

        $query = mysqli_query($conexion,$sql);

        if($query){
            //añado esta linea para que no agarre el primer usuario, sino que busque entre todos los posibles usuarios
            //brute force al fallo la verdad
            while($fila = mysqli_fetch_assoc($query)){
                /*
                echo '<br>';
                var_dump($fila);

                echo '<br>';
                echo $password;
                echo '<br>';
                echo $fila["contraseña"];
                
                echo '<br>';
                echo hash("sha256",$password);
                
                $contra = $fila["contraseña"];
                if($contra == NULL) $contra = "";
                var_dump(hash_equals($contra,hash("sha256",$password)));
                */
                
                $contra_bd = $fila["contraseña"];
                if($fila["contraseña"] == NULL) $contra_bd = "";
                if($tipoUsuario == 'alumno' && hash_equals($contra_bd,hash("sha256",$password))){

                    $_SESSION['usuario'] = $tipoUsuario;
                    $_SESSION['id_alumno'] = $fila['id_alumno'];
                    $_SESSION['nocta'] = $fila['nocta'];
                    $_SESSION['nombre'] = $fila['nombre'];
                    $_SESSION['id_grupo'] = $fila['id_grupo'];
                    $sql2 = "SELECT nombre_grupo,modulo_activo FROM grupo WHERE id_grupo = ". $fila['id_grupo'] ."";
                    if($query2 = mysqli_query($conexion,$sql2)){
                        $fila2 = mysqli_fetch_assoc($query2);
                        $_SESSION['grupo'] = $fila2['nombre_grupo'];
                        $_SESSION['moduloActivo'] = $fila2['modulo_activo'];
                    }



                    setcookie("user", $fila['nocta'], time() + (86400), "/");
                    header("Location: ./Templates/alumno/Homealumno.php");
                }
                if($tipoUsuario == 'profesor' && hash_equals($contra_bd,hash("sha256",$password))){

                    $_SESSION['usuario'] = $tipoUsuario;
                    $_SESSION['id_profesor'] = $fila['id_profesor'];
                    $_SESSION['numero_trabajador'] = $fila['numero_trabajador'];
                    $_SESSION['nombre_profesor'] = $fila['nombre_profesor'];

                    setcookie("user", $fila['numero_trabajador'], time() + (86400), "/");
                    header("Location: ./Templates/profesor/homeProfesor.php");
                }
                if($tipoUsuario == 'administrador' && hash_equals($contra_bd,hash("sha256",$password))){
                    
                    $_SESSION['usuario'] = $tipoUsuario;
                    $_SESSION['id_administrador'] = $fila['id_administrador'];
                    $_SESSION['numero_trabajador'] = $fila['numero_trabajador'];
                    $_SESSION['nombre_administrador'] = $fila['nombre_administrador'];

                    setcookie("user", $fila['numero_trabajador'], time() + (86400), "/");
                    header("Location: ./Templates/admin/searchAlAdmin.php");
                }
            }
            
        } else {
            //header("Location: ./index.php");
        }
        
    } else {
        if(isset($_COOKIE["user"])){
            $usuario = $_COOKIE["user"];

            $tipoUsuario = buscarUsuario($conexion,$usuario);
            
            $sql = "SELECT * FROM $tipoUsuario WHERE $usuario";
            $query = mysqli_query($conexion,$sql);
            
            if($query){
                $fila = mysqli_fetch_assoc($query);

                if($tipoUsuario == 'alumno'){

                    $_SESSION['usuario'] = $tipoUsuario;
                    $_SESSION['id_alumno'] = $fila['id_alumno'];
                    $_SESSION['nocta'] = $fila['nocta'];
                    $_SESSION['nombre'] = $fila['nombre'];
                    $_SESSION['grupo'] = "";

                    $sql2 = "SELECT nombre_grupo FROM grupo WHERE id_grupo = ". $fila['id_grupo'] ."";
                    if($query2 = mysqli_query($conexion,$sql2)){
                        $fila2 = mysqli_fetch_assoc($query2);
                        $_SESSION['grupo'] = $fila2['nombre_grupo'];
                    }

                    setcookie("user", $fila['nocta'], time() + (86400), "/");
                    header("Location: ./Templates//alumno/Homealumno.php");
                }
                if($tipoUsuario == 'profesor'){

                    $_SESSION['usuario'] = $tipoUsuario;
                    $_SESSION['id_profesor'] = $fila['id_profesor'];
                    $_SESSION['numero_trabajador'] = $fila['numero_trabajador'];
                    $_SESSION['nombre_profesor'] = $fila['nombre_profesor'];

                    setcookie("user", $fila['numero_trabajador'], time() + (86400), "/");
                    header("Location: ./Templates//profesor/homeProfesor.php");
                }
                if($tipoUsuario == 'administrador'){
                    
                    $_SESSION['usuario'] = $tipoUsuario;
                    $_SESSION['id_administrador'] = $fila['id_administrador'];
                    $_SESSION['numero_trabajador'] = $fila['numero_trabajador'];
                    $_SESSION['nombre_administrador'] = $fila['nombre_administrador'];

                    setcookie("user", $fila['numero_trabajador'], time() + (86400), "/");
                    header("Location: ./Templates/admin/searchAlAdmin.php");
                }
            }

        }
    }

    //--- LÓGICA DE IMÁGENES RANDOM ---
    $listaImagenes = [
        './Statics/img/img-login/imagennodesertexd.png',
        './Statics/img/img-login/auditorio.jpeg',
        './Statics/img/img-login/jacarandas.jpeg',
        './Statics/img/img-login/biblio.jpeg',
        './Statics/img/img-login/login-icon.jpg'//si quieren agregar mas pongan su ruta aca
    ];

    //índice random
    $indiceRandom = array_rand($listaImagenes);
    $imagenSeleccionada = $listaImagenes[$indiceRandom];

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./Statics/Css/indexGraph.css">
        <title>nodeserte</title>
    </head>
    <body>
        <main>
            <!--Sección superior-->
            <section class="welcomeContainer">
                <h1>¡Bienvenido a NodesErTE!</h1> <!--Titulo de Bienvenida-->
            </section>

            <section class="generalContainer"> <article class="articleIcon">
                    <img class="icon" src="<?php echo $imagenSeleccionada; ?>" alt="Logo Aleatorio">
                </article>

                <article class="articleLogin"> <!--Articulo para el apartado de bienvenida-->
                    <!--Formulario para el inicio de sesion-->
                    <form action="index.php" method="post" class="loginForm">
                        <h1>Iniciar Sesión</h1>
                        <!--Apartado para ingresar usuario-->
                        <div class="inputContainer">
                            <label for="userLog" class="input">
                                <input type="text" id="userLog" name="userLog" minlength="3" maxlength="15" placeholder="Numero de cuenta/trabajador" required>
                            </label>
                        <!--Apartado para ingresar contraseña-->
                            <label for="passwordLog" class="input">  
                                <input type="password" id="passwordLog" name="passwordLog" minlength="3" maxlength="15" placeholder="Contraseña" required>
                            </label>
                        </div>
                        <button type="submit">INGRESAR</button>
                    </form>
                </article>
            </section>

        </main>
    </body>
</html>