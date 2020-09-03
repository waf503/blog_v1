<?php
require_once 'includes/redireccionar.php';
require_once 'includes/cabecera.php';
require_once 'includes/lateral.php';

?>

<div id="principal">
    <h1>Crear Categorias</h1>

    <form action="guardar_categoria.php" method="POST">
        <br>
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" id="nombre">
        <input type="submit" value="Guardar" >

    </form>


</div>

<?php require_once 'includes/footer.php';?>