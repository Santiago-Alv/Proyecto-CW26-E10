<?php
include '../../config/config_db.php';
include '../../Dynamics/validaciones.php';
session_start();

$listaModulos = array();
$listaProfesores = array();
$listaGrupos = array();

    $sql ="SELECT id_modulo,nombre_modulo FROM modulo";
    $query = mysqli_query($conexion,$sql);
    if($query){
        while($fila = mysqli_fetch_assoc($query)){
            $listaModulos[] = $fila;
        }
    }

    $sql ="SELECT id_profesor,nombre_profesor FROM profesor";
    $query = mysqli_query($conexion,$sql);
    if($query){
        while($fila = mysqli_fetch_assoc($query)){
            $listaProfesores[] = $fila;
        }
    }

    $sql ="SELECT nombre_grupo FROM grupo";
    $query = mysqli_query($conexion,$sql);
    if($query){
        while($fila = mysqli_fetch_assoc($query)){
            $listaGrupos[] = $fila;
        }
    }
// consulta db

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nombre']) && isset($_POST['moduloActivo']) && isset($_POST['profesorGrupo'])){
        
        $findModule = false;
        $findProfesor = false;
        $findGrupo = false;

        $nombre_grupo = $_POST["nombre"];
        $nombre_grupo = sanitizarEntrada($conexion,$nombre_grupo);
        if(strlen($nombre_grupo) > 3){
            header("Location: repetidoGrupo.php");
            exit();
        }
        $moduloActivo = $_POST["moduloActivo"];

        $profesor = $_POST["profesorGrupo"];

        foreach($listaModulos as $modulo){
            if($moduloActivo == $modulo['id_modulo']){
                $findModule = true;
                break;
            }
        }
        if(!$findModule){
            header("Location: repetidoGrupo.php");
            exit();
        }
        
        foreach($listaProfesores as $profesores){
            if($profesor == $profesores['id_profesor']){
                $findProfesor = true;
                break;
            }
        }
        if(!$findProfesor){
            header("Location: repetidoGrupo.php");
            exit();
        }

        foreach($listaGrupos as $grupo){
            if($nombre_grupo == $grupo['nombre_grupo']){
                $findGrupo = true;
                break;
            }
        }
        // Evaluar: si resultado es 1 el alumno ya existe
        if ($findGrupo) 
        {
            header("Location: repetidoGrupo.php");
            exit();
        } 
        else {
            //Insertar datos a la base de datos si no se repite
            $sql2 = "INSERT INTO grupo (nombre_grupo, id_profesor, modulo_activo) 
                VALUES ('$nombre_grupo',$profesor,$moduloActivo)";
            $query = mysqli_query($conexion, $sql2); 
            
            header("Location: exitoAñadirGrupo.php?grupo=".urlencode($nombre_grupo));//lleva variable de numero de cuenta
            exit();
        }
    }
    else
    {
       echo "error";
    }  
  

?>

