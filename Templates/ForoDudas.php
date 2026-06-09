<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Foro de dudas de alumno</title>
        <link rel="stylesheet" href="../Statics/Css/ForoDudas.css">
    </head>
    <body>
        <main id= "contenido">
            <div class="input-pregunta">
                <label for="pregunta">¿Qué duda tienes? <br>Menciona el tema o la duda en general que tengas.<br></label>
                <input type="text" name="pregunta" id="ipt-pregunta" placeholder="Escribe tu duda aquí" required>
            </div> 
            <div class="botonesforo">
                <form action="historialpreguntas.php">
                    <button type="submit" id="historial-submit">Ver historial</button>
                </form>
                <button type="submit" id="pregunta-submit">Enviar</button>
            </div>
        </main>   
    </body>
</html>
    
