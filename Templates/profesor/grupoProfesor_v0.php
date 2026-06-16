<?php
    session_start();

    include '../../config/config_db.php';
    $listaGrupos = array();
    $grupoAct = array();
    
    if (isset($_SESSION['usuario']) && $_SESSION['usuario'] == 'profesor') {

        $sql = "SELECT id_grupo, nombre_grupo FROM grupo WHERE id_profesor = " . $_SESSION['id_profesor'] . "";
        $query = mysqli_query($conexion,$sql);
        while($fila = mysqli_fetch_assoc($query)){
            $listaGrupos[] = $fila;
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
        } else{
            header("Location: ./homeProfesor.php");
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
        <?php echo "<title>". $grupoAct['nombre_grupo'] ." </title>"; ?>
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
                <section class="grupoGeneral">
                    <article class="grupoConfig">
                        <?php echo "<h2>".$grupoAct['nombre_grupo']."</h2>"; ?>
                        <a href="./agregarAlumno.php" >Agregar Alumno</a>
                        <a href="./buscarAlumno.php">Buscar Alumno </a>
                        <a>Seleccionar módulo </a>
                    </article>
                    <article class="grupoLista">
                        <div class = "alumnoData">
                            
                        </div>
                    </article>
                </section>

                <section class="grupoData">
                    <div class="indiceGrupo">86%</div>
                    <h3>Indice de Deserción</h3>
                    <a >Lista de asistencia</a>
                    <?php echo "<a href='./registrarCalif.php?id_grupo=".$grupoAct['id_grupo']."'>Registrar calificación</a>"; ?>
                </section>
            </main>
        </div>

    </body>
</html>