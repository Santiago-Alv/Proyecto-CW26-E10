<?php

$grupoAct="61B";

?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href = "..\..\Statics\Css\profesorGraph.css">
        <?php echo "<title> $grupoAct </title>"; ?>
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
                <a class="menuOp" href="./grupoProfesor.php"> 61B </a>
                <a class="menuOp" href="./grupoProfesor.php"> 61D </a>
                <a class="menuOp"> RECURSOS </a>
                <a class="menuOp"> DUDAS </a>
            </aside>

            <main>
                <section class="grupoGeneral">
                    <article class="grupoConfig">
                        <h2> 61B </h2>
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
                    <a>Lista de asistencia</a>
                    <a>Registrar calificación</a>
                </section>
            </main>
        </div>

    </body>
</html>