<?php
    session_start();

    include '../../config/config_db.php';
    $listaGrupos = array();
    $listaResultados = array();
    $listaModulos = array();
    $listaCalificaciones = array();
    $califActual = '';
    $grupoAct = array();
    
    if (isset($_SESSION['usuario']) && $_SESSION['usuario'] == 'profesor') {
        if($_SERVER["REQUEST_METHOD"] == 'POST' && isset($_POST['id_alumno'])  && isset($_POST['id_modulo'])  && isset($_POST['califAlumno'])){
            $id_alumno = $_POST['id_alumno'];
            $id_modulo = $_POST['id_modulo'];
            $calificacion = $_POST['califAlumno'];
            unset($_POST);
            $sql6 = "SELECT id_calif FROM calif_mod WHERE id_alumno = $id_alumno AND id_modulo=$id_modulo";
            $query6 = mysqli_query($conexion,$sql6);
            if($query6){
                if($fila6 = mysqli_fetch_assoc($query6)){
                    $sql7 = "UPDATE calif_mod SET calificacion = $calificacion WHERE id_alumno = $id_alumno AND id_modulo = $id_modulo";
                    $query7 = mysqli_query($conexion,$sql7);
                    if ($query7) {
                        echo "Calificación guardada con éxito.";
                    } else {
                        echo "Error: " . mysqli_error($conexion);
                    }
                } else {
                    $sql5 = "INSERT INTO calif_mod (id_alumno,id_modulo,calificacion) VALUES ($id_alumno,$id_modulo,$calificacion)";
                    $query5 = mysqli_query($conexion,$sql5);
                    if ($query5) {
                        echo "Calificación guardada con éxito.";
                    } else {
                        echo "Error: " . mysqli_error($conexion);
                    }
                }
            }
        }

        
        $sql = "SELECT id_grupo, nombre_grupo FROM grupo WHERE id_profesor = " . $_SESSION['id_profesor'] . "";
        $query = mysqli_query($conexion,$sql);
        if($query){
            while($fila = mysqli_fetch_assoc($query)){
                $listaGrupos[] = $fila;
            }
        }
        
        if(isset($_GET['id_grupo'])){
            foreach($listaGrupos as $grupo){
                if($_GET['id_grupo'] == $grupo['id_grupo']){
                    $grupoAct['nombre_grupo'] = $grupo['nombre_grupo'];
                    $grupoAct['id_grupo'] = $grupo['id_grupo'];
                }
            }
            if(count($grupoAct) == 0){
                header("Location: ./homeProfesor.php");
            }
        } else {
            header("Location: ./homeProfesor.php");
        }

        $sql2 = "SELECT * FROM alumno WHERE id_grupo = ".$grupoAct['id_grupo']."";
        $query2 = mysqli_query($conexion,$sql2);
        if($query2){
            while($fila2 = mysqli_fetch_assoc($query2)){
                $listaResultados[] = $fila2;
            }
        }

        $sql3 = "SELECT * FROM modulo";
        $query3 = mysqli_query($conexion,$sql3);
        if($query3){
            while($fila3 = mysqli_fetch_assoc($query3)){
                $listaModulos[] = $fila3;
            }
        }

        foreach($listaModulos as $modulo){
            foreach($listaResultados as $alumno){
                $sql8 = "SELECT * FROM calif_mod WHERE id_modulo = ". $modulo['id_modulo'] . " AND id_alumno = " . $alumno['id_alumno'] . "";
                $query8 = mysqli_query($conexion,$sql8);
                if($query8){
                    while($fila8 = mysqli_fetch_assoc($query8)){
                        $listaCalificaciones[] = $fila8;
                    }
                }
            }
        }


    } else {
        header("Location: ../index.php");
    }


?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href = "..\..\Statics\Css\profesorGraph.css">
        <title>Home</title>
    </head>
    <body>
        <header>
            <img class="logo" src= "..\..\Statics\img\logo-unam.png">

            <a href="..\index.php">Cerrar Sesión</a>
        </header>
    
        <nav>
            <div class="breadcrumbs">
                <a href="./homeProfesor.php">🏠</a>
                <span>&lt;</span>
                <span>&gt;</span>
                <span>Profesor Jirafales</span>
            </div>
        </nav>

        <div class="mainCont">
            <aside>
                <?php
                    foreach($listaGrupos as $grupo){
                        echo "<a class='menuOp' href='./grupoProfesor.php?id_grupo=". $grupo['id_grupo'] ." '> " . $grupo['nombre_grupo'] . " </a>";
                    }
                ?>
                <a class="menuOp"> RECURSOS </a>
                <a class="menuOp"> DUDAS </a>
            </aside>

            <main>
                <section class ="grupoGeneral">
                    
                    <?php   
                        foreach($listaModulos as $modulo){
                            echo "<h3>Modulo: ".$modulo['nombre_modulo']."<h3>";

                                foreach($listaResultados as $alumno){
                                    foreach($listaCalificaciones as $calificacion){
                                            if($calificacion['id_alumno'] == $alumno['id_alumno'] && $calificacion['id_modulo'] == $modulo['id_modulo']){
                                                $califActual = $calificacion['calificacion'];
                                                break;
                                            } else {
                                                $califActual = 'SE';
                                            }
                                        }
                                echo "<form action='./registrarCalif.php?id_grupo=" . $grupoAct['id_grupo'] . "' method='POST' class='alumnoData'>
                                        
                                        <p>" . $alumno['nombre'] . "</p>
                                        <input type='number' name='califAlumno' min='0' max='10' step='0.1' placeholder='$califActual' required>
                                        
                                        <input type='hidden' name='id_alumno' value='" . $alumno['id_alumno'] . "'>
                                        <input type='hidden' name='id_modulo' value='" . $modulo['id_modulo'] . "'>
                                        
                                        <button type='submit'>Registrar</button>
                                        
                                    </form>";
                            }
                        }
                        
                    ?>
                </section>
            </main>
        </div>

    </body>
</html>