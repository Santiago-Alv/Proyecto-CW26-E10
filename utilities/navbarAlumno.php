<?php
// navbarAlumno.php
?>    
    <header class="top-header">
    <div class="logo">
        <img src="../../Statics/img/logo-unam.png" alt="Logo UNAM"> 
    </div>
    <h1 id="nomb_proyecto">No desErTE</h1>
    <div class="navbar-logout">
        <a href="./../../Dynamics/cerrar_sesion.php" class="btn-logout">Cerrar Sesión </a>
    </div>
    
    </header>

    <div class="sub-navbar">
        <div class="breadcrumbs">
            <span>🏠</span>
            <span><</span>
            <span>></span>
            <!-- Sanitizar -->
            <span>Alumno: <?php echo htmlspecialchars($nombre_alumn); ?></span>
            <span>Grupo: <?php echo htmlspecialchars($grupo_alumn); ?></span>
        </div>
    </div>
