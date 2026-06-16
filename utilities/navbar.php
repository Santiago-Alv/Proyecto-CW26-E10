<?php
// navbarAdmin.php
// Placeholder
$tipo_usu = "Administrador";
$nombre_usu = "Angela"; 
?>    
    <header class="top-header navbar-superior">
    <div class="logo navbar-logo">
        <img src="../../Statics/img/logo-unam.png" alt="Logo UNAM" class="img-logo"> 
    </div>
    <p id = "nomb_proyecto">No desErTE</p>
    <div class="navbar-logout">
        <a href="./../../Dynamics/cerrar_sesion.php"><button class="btn-logout">Cerrar Sesión</button></a>
    </div>
    

    </header>

    <div class="sub-navbar sub-navbar-ruta">
        <div class="breadcrumbs">
            <span>🏠</span>
            <span><</span>
            <span>></span>
            <!-- Sanitizar -->
            <span><?php
                echo $tipo_usu." ".htmlspecialchars($nombre_usu); 
                ?></span>
        </div>
    </div>
