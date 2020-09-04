<?php
//if para comprobar si llega informacion por post

if(isset($_POST)){
    require_once 'includes/conexion.php';

    //reciviendo datos y los escapo de una ves
    $titulo = isset($_POST['titulo']) ? mysqli_real_escape_string($db, $_POST['titulo']) : false;
    $descripcion = isset($_POST['descripcion']) ? mysqli_real_escape_string($db, $_POST['descripcion']) : false; 
    $categoria = isset($_POST['categoria']) ? (int)$_POST['categoria'] : false;
    $usuario =  $_SESSION['usuario']['id'];



    //validacion
    $errores = array();
    
    
    if(empty($titulo)){ 
        $errores['titulo'] = 'El titulo no es valido';
    }
    if(empty($descripcion)){
        $errores['descripcion'] = 'La descripcion no es valida';
    }
    if(empty($categoria) &&  !is_numeric($categoria)){
        $errores['categoria'] = 'La categoria no es valida';
    }


    if(count($errores) == 0){
        $entrada_id = $_GET['entrada_id'];
        $usuario_id = $_SESSION['usuario']['id'];
        $sql = "UPDATE entradas SET titulo='$titulo', descripcion='$descripcion', categoria_id=$categoria WHERE id = $entrada_id AND usuario_id = $usuario_id" ;
        $guardar = mysqli_query($db,$sql); 
        header("Location: index.php");
        die();
        
    }else{
        $_SESSION['errores_entrada'] = $errores;
    }
}
header("Location: entradas.php");


