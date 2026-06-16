<?php
    if(isset($_SESSION['usuario']) && $_SESSION['usuario'] == 'alumno'){
        $nombre_alumn = $_SESSION['nombre'];
        $grupo_alumn = $_SESSION['grupo'];
        $tipo_usu = $_SESSION['usuario'];
    } else {
        include './../Dynamics/cerrar_sesion.php';
    }
?>    
    <header class="top-header">
    <div class="logo">
        <img src="../../Statics/img/logo-unam.png" alt="Logo UNAM"> 
    </div>
    <a id="nomb_proyecto" href="./Homealumno.php">No desErTE</a>
    <div class="navbar-logout">
        <a href="./../Dynamics/cerrar_sesion.php" class="btn-logout">Cerrar Sesión </a>
    </div>
    
    </header>

    <div class="sub-navbar">
        <div class="breadcrumbs">
            <!-- Sanitizar -->
            <span>Alumno: <?php echo htmlspecialchars($nombre_alumn); ?></span>
            <span>Grupo: <?php echo htmlspecialchars($grupo_alumn); ?></span>
        </div>
    </div>
