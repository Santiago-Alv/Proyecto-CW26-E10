<?php
// navbarAlumno.php
?>    
    <header class="top-header">
    <div class="logo">
        <img src="../Statics/img/logo-unam.png" alt="Logo UNAM"> 
    </div>
    <button class="btn-logout">Cerrar Sesión</button>
    </header>

    <div class="sub-navbar">
        <div class="breadcrumbs">
            <span>🏠</span>
            <span><</span>
            <span>></span>
            <!-- Sanitizar -->
            <span>Alumno: <?php echo htmlspecialchars($nombre_alumn); ?></span>
        </div>
    </div>
