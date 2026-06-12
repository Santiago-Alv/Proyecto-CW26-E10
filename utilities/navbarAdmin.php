<?php
// navbarAdmin.php
$nombre_admin = "Angela"; // Placeholder
?>    
    <header class="top-header">
    <div class="logo">
        <img src="../../Statics/img/logo-unam.png" alt="Logo UNAM"> 
    </div>
    <button class="btn-logout">Cerrar Sesión</button>
    </header>

    <div class="sub-navbar">
        <div class="breadcrumbs">
            <span>🏠</span>
            <span><</span>
            <span>></span>
            <!-- Sanitizar -->
            <span>Administrador <?php echo htmlspecialchars($nombre_admin); ?></span>
        </div>
    </div>
