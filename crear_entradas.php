<?php
require_once 'includes/redireccionar.php';
require_once 'includes/cabecera.php';
require_once 'includes/lateral.php';
?>
<div id="principal">
    <h1>Crear entradas</h1>
    <br>
    <p>Añade nuevas entradas al blog para que los usuarios puedan leerlas y disgrutar del contenido</p>
    <form action="guardar_entrada.php" method="POST">
        <br>
        <label for="nombre">Titulo: </label>
        <input type="text" name="titulo" id="titulo">
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'titulo') : ''; ?>


        <label for="nombre">Descripción: </label>
        <br>
        <textarea  cols="50" rows="4" name="descripcion" id="descripcion" placeholder="Agregue una descripcion..."></textarea>
        <br>
        <br>
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'descripcion') : ''; ?>

        <label for="categoria">Categoria </label>
        <br>
        <select name="categoria" id="categoria">

            <?php 
            $categorias = getCategorias($db);
            if(!empty($categorias)):
                while($categoria = mysqli_fetch_assoc($categorias)):
            ?>
                <option value="<?=$categoria['id']?>">
                <?=$categoria['nombre']?>
                </option>
            <?php
                endwhile;
            endif;
            ?>

        </select>
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'categoria') : ''; ?>


        <input type="submit" value="Guardar" >

    </form>

<?php borrarErrores(); ?>
</div>

<?php require_once 'includes/footer.php';?>