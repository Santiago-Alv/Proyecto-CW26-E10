<?php
    if(isset($_SESSION['usuario']) && $_SESSION['usuario'] == 'administrador'){
        $nombre_usu = $_SESSION['nombre_administrador'];
        $tipo_usu = $_SESSION['usuario'];
    } else {
        include '../Dynamics/cerrar_sesion.php';
    }
?>    
    <header class="top-header navbar-superior">
    <div class="logo navbar-logo">
        <img src="../../Statics/img/logo-unam.png" alt="Logo UNAM" class="img-logo"> 
    </div>
    <a id = "nomb_proyecto" href="./searchAlAdmin.php">No desErTE</a>
    <div class="navbar-logout">
        <a href="./../../Dynamics/cerrar_sesion.php"><button class="btn-logout">Cerrar Sesión</button></a>
    </div>
    

    </header>

    <div class="sub-navbar sub-navbar-ruta">
        <div class="breadcrumbs">
            <!-- Sanitizar -->
            <span><?php
                echo $tipo_usu." ".htmlspecialchars($nombre_usu); 
                ?></span>
        </div>
    </div>
