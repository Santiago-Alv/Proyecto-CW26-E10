<?php
// navbarAdmin.php
// Placeholder
$tipo_usu = "Administrador";
$nombre_usu = "Angela"; 
?>    
    <header class="top-header">
    <div class="logo">
        <img src="../../Statics/img/logo-unam.png" alt="Logo UNAM"> 
    </div>
    <p id = "nomb_proyecto">No desErTE</p>
    <a href="./../../Dynamics/cerrar_sesion.php"><button class="btn-logout">Cerrar Sesión</button></a>

    </header>

    <div class="sub-navbar">
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
