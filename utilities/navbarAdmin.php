<?php
// navbarAdmin.php
?>    
    <header class="top-header">
    <div class="logo">
        <img src="../../Statics/img/logo-unam.png" alt="Logo UNAM"> 
    </div>
    
    <a href="./../../Dynamics/cerrar_sesion.php"><button class="btn-logout">Cerrar Sesión</button></a>
    </header>

    <div class="sub-navbar">
        <div class="breadcrumbs">
            <span>🏠</span>
            <span><</span>
            <span>></span>
            <!-- Sanitizar -->
            <span>Admin <?php echo htmlspecialchars($nombre_admin); ?></span>
        </div>
    </div>
