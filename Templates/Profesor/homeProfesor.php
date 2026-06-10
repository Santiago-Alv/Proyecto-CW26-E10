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
            <div class="logo">
                <img src="../../Statics/img/logo-unam.png" alt="Logo">
            </div>
            <button class="btn-logout">Cerrar Sesión</button>
        </header>
    
        <nav>
            <div class="breadcrumbs">
                <span>🏠</span>
                <span>&lt;</span>
                <span>&gt;</span>
                <span>Profesor Jirafales</span>
            </div>
        </nav>

        <div class="mainCont">
            <aside>
                <div class="menuOp"> 61B </div>
                <div class="menuOp"> 61D </div>
                <div class="menuOp"> RECURSOS </div>
                <div class="menuOp"> DUDAS </div>
            </aside>

            <main>
                <h1>Bienvenido Profesor Jirafales</h1>
            </main>
        </div>

    </body>
</html>