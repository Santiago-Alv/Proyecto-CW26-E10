<?php
    $usuario = "";
    $nombprofe = "";
    //var_dump($_SESSION);
    if (isset($_SESSION['usuario'])){
        $usuario = $_SESSION['usuario'];
        if (isset($_SESSION['nombre_profesor']))
        {
            $nombprofe= $_SESSION['nombre_profesor']; 
        } 
    }
?>
<header class="navbar-superior">
    <div class="navbar-logo">
        <img src="../../Statics/img/logo-unam.png" alt="Logo UNAM" class="img-logo">
    </div>
    <h1 id="nomb_proyecto">NodesErTE</h1>
    <div class="navbar-logout">
        <a href="./../../Dynamics/cerrar_sesion.php" class="btn-logout">Cerrar Sesión</a>
    </div>
</header>

<div class="sub-navbar-ruta">
    <div class="ruta-contenido">
        <span class="icono-home"><a href="homeProfesor_v0.php">🏠</a></span> 
        <span class="separador">&lt;</span> 
        <span class="separador">&gt;</span> 
        <span class="usuario-actual"><?php echo $usuario;echo " "; echo $nombprofe?></span>
    </div>
</div>