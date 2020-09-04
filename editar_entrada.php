<?php
require_once 'includes/redireccionar.php';
require_once 'includes/cabecera.php';
require_once 'includes/lateral.php';
?>

<?php
    $entrada_actual = getEntrada($db, $_GET['id']);
    
    if(!isset($entrada_actual['id'])){

        header("Location: index.php");
    } 
?>
<div id="principal">
    <h1>Actualizar entrada</h1>
    <br>
    <form action="actualizar_entrada.php?entrada_id=<?=$entrada_actual['id']?>" method="POST">
        <br>
        <label for="nombre">Titulo: </label>
        <input type="text" name="titulo" id="titulo" value="<?=$entrada_actual['titulo']?>">
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'titulo') : ''; ?>


        <label for="nombre">Descripción: </label>
        <br>
        <textarea  cols="50" rows="10" name="descripcion" id="descripcion"><?= $entrada_actual['descripcion']?></textarea>
        <br>
        <br>
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'descripcion') : ''; ?>

        <label for="categoria">Categoria </label>
        <?=$entrada_actual['categoria']?>
        <br>
        <select name="categoria" id="categoria" >

            <?php 
            $categorias = getCategorias($db);
            if(!empty($categorias)):
                while($categoria = mysqli_fetch_assoc($categorias)):
            ?>
                <option value="<?=$categoria['id']?>" <?=($categoria['id'] == $entrada_actual['categoria_id']) ? 'selected="selected"' : '' ?>>
					<?=$categoria['nombre']?>
				</option>
            <?php
                endwhile;
            endif;
            ?>

        </select>
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'categoria') : ''; ?>


        <input type="submit" value="Acualizar" >

    </form>

<?php borrarErrores(); ?>
</div>

<?php require_once 'includes/footer.php';?>