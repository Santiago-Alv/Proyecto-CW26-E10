<?php

    if(isset($_SESSION['usuario']) && $_SESSION['usuario'] == 'profesor'){
        $nombre_usu = $_SESSION['nombre_profesor'];
        $tipo_usu = $_SESSION['usuario'];

    } else {
        include '../Dynamics/cerrar_sesion.php';
    }
?>

<header class="navbar-superior">
    <div class="navbar-logo">
        <img src="../../Statics/img/logo-unam.png" alt="Logo UNAM" class="img-logo">
    </div>
    <a id="nomb_proyecto" href="./homeProfesor.php">No desErTE</a>
    <div class="navbar-logout">
        <a href="./../../Dynamics/cerrar_sesion.php" class="btn-logout">Cerrar Sesión</a>
    </div>
</header>

<div class="sub-navbar-ruta">
    <div class="ruta-contenido">
        <?php echo "<span class='usuario-actual'>Profesor: $nombre_usu </span>"; ?>
    </div>
</div>