<?php
session_start();

if (!isset($_SESSION['usuario']) || $_SESSION['tipo'] !== 'profesor') {
    
    //header("Location: ../index.html"); 
    // echo ¨vete wei no eres porfe¨
    // Matar pa q no cargue lo demas
    //exit(); 
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
                <a class="menuOp" href="./grupoProfesor.php"> 61B </a>
                <a class="menuOp" href="./grupoProfesor.php"> 61D </a>
                <a class="menuOp"> RECURSOS </a>
                <a class="menuOp"> DUDAS </a>
            </aside>

            <main class="opModProfe">
                <h2> 61B </h2>
                <div class="search-title">
                    <span>🔍 Buscar alumno</span>
                </div>
                <form action="alumnos.php" method="GET" class="search-form">
                    <input type="text" name="nombre" placeholder="Nombre del alumno">
                    <input type="text" name="cuenta" placeholder="Número de cuenta">
                    <button type="submit" class="btn-search">Buscar</button>
                </form>

            </main>
        </div>

    </body>
</html>