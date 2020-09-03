<?php
if(isset($_POST)){
    require_once 'includes/conexion.php';

    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;
    

    echo $nombre;
    
    //Array de errores
    $errores = array();

    //Validando el campo nombre antes de meterlo a la base de datos
    if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)){
        $nombre_valido = true;
    }else{
        $nombre_valido = false;
        $errores['nombre'] = "El nombre no es valido";
    }
    if(count($errores)==0){
        $sql = "INSERT INTO categorias VALUES(NULL, '$nombre');";
        $guardar = mysqli_query($db, $sql);
    }
    
}
header('Location: index.php');

?>
