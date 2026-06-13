<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recursos Profesor</title>
    <link rel="stylesheet" href="../../Statics/Css/subirRecurso.css">
</head>
<body>

    <?php include '../../utilities/navbarProfe.php'; ?>

    <div class="main-layout">
        
        <?php 
        $pagina_activa = 'recursos'; 
        include '../../utilities/sidebarProfe.php'; 
        ?>

        <main class="content view-recursos">
            <div class="recursos-container">
                <div class="caja-titulo">
                    <h2>RECURSOS</h2>
                </div>

                <div class="seccion-formulario">
                    <div class="capsula-header">
                        <span class="icono-mas">+</span> Añadir nuevo recurso
                    </div>
                    
                    <div class="contenedor-inputs">
                        <input type="text" class="input-gris input-largo" placeholder="Introduce comentario y/o URL">
                        
                        <div class="input-gris input-largo wrapper-archivo">
                            <span class="texto-archivo">Selecciona imagen</span>
                            <div class="falso-input-file">
                                <input type="file" id="imagen" class="file-oculto">
                                <label for="imagen" class="btn-browse">Browse...</label>
                            </div>
                        </div>
                        
                        <select class="input-gris input-corto">
                            <option value="">Selecciona grupo</option>
                            <option value="61B">61B</option>
                            <option value="61D">61D</option>
                        </select>
                        
                        <select class="input-gris input-corto">
                            <option value="">Selecciona modulo</option>
                            <option value="1">Módulo 1</option>
                            <option value="2">Módulo 2</option>
                        </select>
                        
                        <div class="alinear-boton">
                            <button class="btn-gris">Subir</button>
                        </div>
                    </div>
                </div>

                <div class="seccion-eliminar">
                    <div class="capsula-header">
                        <span class="icono-menos">-</span> Eliminar recurso
                    </div>
                    <button class="btn-gris btn-seleccionar">Seleccionar</button>
                </div>
            </div>
        </main>

    </div>

</body>
</html>