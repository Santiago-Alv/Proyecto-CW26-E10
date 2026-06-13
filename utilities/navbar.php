<?php
// navbarAdmin.php
?>    
    <header class="top-header">
    <div class="logo">
        <img src="../../Statics/img/logo-unam.png" alt="Logo UNAM"> 
    </div>
    <p id = "nomb_proyecto">No desErTE</p>
    <button class="btn-logout">Cerrar Sesión</button>
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
