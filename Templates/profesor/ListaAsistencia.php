
<?php
    // placeholder
    $nombre_alumno = "Juanito Juanito"; 
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lista de asistencia de alumnos</title>
        <link rel="stylesheet" href="../../Statics/Css/ListadeAsistencia.css">
        <link rel="stylesheet" href="../../Statics/Css/profeGraph.css">
    </head>
    <body>
        <?php include '../../utilities/navbarAlumn.php'; ?>
        <div class="main-layout">
            <?php include '../../utilities/sidebarProfe.php'; ?>
            <main id= "contenido">
                <div class="tituloListaAsistencia">
                    <h1>61D Asistencia</h1>
                </div> 
                <div class="lista-asist">
                    <table class="asistencia-alumno1">
                        <tbody>
                            <tr>
                                <td class="nombalumlista">Juanito Juanito Perez Constantinopla</td>
                                <td>Fecha</td> 
                                <td><select class="tipo-asist" name= "tipodeasist">
                                    <option value="asistio">Asistió</option>
                                    <option value="falta">Falta</option>
                                    <option value="justificado">Justificada</option>
                                    </select>
                                </td>
                                <td>Fecha</td> 
                                <td><select class="tipo-asist" name= "tipodeasist">
                                    <option value="asistio">Asistió</option>
                                    <option value="falta">Falta</option>
                                    <option value="justificado">Justificada</option>
                                    </select>
                                </td>
                                <td>Fecha</td> 
                                <td><select class="tipo-asist" name= "tipodeasist">
                                    <option value="asistio">Asistió</option>
                                    <option value="falta">Falta</option>
                                    <option value="justificado">Justificada</option>
                                    </select>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="asistencia-alumno2">
                        <tbody>
                            <tr>
                                <td class="nombalumlista">Nombre alumno</td>
                                <td>Fecha</td> 
                                <td><select class="tipo-asist" name= "tipodeasist">
                                    <option value="asistio">Asistió</option>
                                    <option value="falta">Falta</option>
                                    <option value="justificado">Justificada</option>
                                    </select>
                                </td>
                                <td>Fecha</td> 
                                <td><select class="tipo-asist" name= "tipodeasist">
                                    <option value="asistio">Asistió</option>
                                    <option value="falta">Falta</option>
                                    <option value="justificado">Justificada</option>
                                    </select>
                                </td>
                                <td>Fecha</td> 
                                <td><select class="tipo-asist" name= "tipodeasist">
                                    <option value="asistio">Asistió</option>
                                    <option value="falta">Falta</option>
                                    <option value="justificado">Justificada</option>
                                    </select>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </main> 
        </div>  
    </body>
</html>
    
