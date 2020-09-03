<?php


function mostrarError($errores, $campo){
    $alerta = '';
    if(isset($errores[$campo]) && !empty($campo)){
        $alerta = "<div class='alerta alerta-error'>". $errores[$campo]." </div>";
        
    }

    return $alerta;
}

function borrarErrores(){

    $borrado = false;

    if(isset($_SESSION['errores'])){
        $_SESSION['errores'] = null;
    }
    
    if(isset($_SESSION['completado'])){
        $_SESSION['completado'] = null;
    }

    if(isset($_SESSION['errores_entrada'])){
        $_SESSION['errores_entrada'] = null;
    }

}

//Listar categorias
function getCategorias($db){
    $sql = "SELECT *FROM categorias ORDER BY id ASC;";
    $categorias = mysqli_query($db,$sql);
    $resultado = array();
    if($categorias && mysqli_num_rows($categorias) >= 1){
        $resultado = $categorias;
    }

    return $resultado;
}

//Listar entradas
function getEntradas($db){
    $sql = "SELECT e.*, c.nombre AS 'categoria' FROM entradas e INNER JOIN categorias c ON e.categoria_id = c.id ORDER BY e.id DESC LIMIT 4;";

    $entradas = mysqli_query($db, $sql);
    $resultado = array();
    if($entradas && mysqli_num_rows($entradas) >= 1){
        $resultado = $entradas;
    }

    //var_dump($resultado);

    //die();

    return $resultado;
}
 ?>