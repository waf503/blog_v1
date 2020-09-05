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

function getCategoria($db,$id){
    $sql = "SELECT *FROM categorias where id = $id;";
    $categorias = mysqli_query($db,$sql);
    $resultado = array();
    if($categorias && mysqli_num_rows($categorias) >= 1){
        $resultado = mysqli_fetch_assoc($categorias);
    }

    return $resultado;
}

function getEntrada($db,$id){
    $sql = "SELECT e.*, c.nombre AS 'categoria', CONCAT(u.nombre, ' ', u.apellido) AS usuario FROM entradas e INNER JOIN categorias c ON e.categoria_id = c.id INNER JOIN usuarios u ON e.usuario_id = u.id WHERE e.id = $id ";
    $entrada = mysqli_query($db,$sql);
    $resultado = array();
    if($entrada && mysqli_num_rows($entrada) >= 1){
        $resultado = mysqli_fetch_assoc($entrada);
    }

    return $resultado;
}

//Listar entradas
function getEntradas($db, $limit = null, $categoria = null, $busqueda = null){
    $sql = "SELECT e.*, c.nombre AS 'categoria', CONCAT(u.nombre, ' ', u.apellido) AS usuario FROM entradas e INNER JOIN categorias c ON e.categoria_id = c.id INNER JOIN usuarios u ON e.usuario_id = u.id ";

    if(!empty($categoria)){
        $sql .= "where e.categoria_id = $categoria";
    }

    if(!empty($busqueda)){
        $sql .= "where e.titulo LIKE '%$busqueda%' ";
    }

    $sql .= " ORDER BY e.id DESC ";

    if($limit){
        $sql .= "LIMIT 4";
    }

    $entradas = mysqli_query($db, $sql);
    $resultado = array();
    if($entradas && mysqli_num_rows($entradas) >= 1){
        $resultado = $entradas;
    }else{

    }


    //var_dump($resultado);

    //die();

    return $resultado;
}

 ?>