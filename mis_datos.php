<?php
require_once 'includes/redireccionar.php';
require_once 'includes/cabecera.php';
require_once 'includes/lateral.php';
?>
<div id="principal">
    <h1>Mis Datos</h1>

    <!-- Mostrar errores -->
    <?php if(isset($_SESSION['completado'])): ?>
                        <div class="alerta alerta-exito"> 
                            <?=$_SESSION['completado']?>
                        </div>
                <?php elseif( isset($_SESSION['errores']['general'])): ?>
                    <div class="alerta alerta-error">
                        <?=$_SESSION['errores']['general']?>
                    </div>
                <?php endif; ?>

    <form action="actualizar_usuario.php" method="POST">
                    <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre') : ''; ?>
                    <p><input type="text" name="nombre" id="nombre" placeholder="Nombre" value="<?=$_SESSION['usuario']['nombre'];?>"></p>
                    <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellido') : ''; ?>
                    <p><input type="text" name="apellido" id="apellido" placeholder="Apellido" value="<?=$_SESSION['usuario']['apellido'];?>"></p>
                    <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email') : ''; ?>
                    <p><input type="email" name="email" id="email" placeholder="Ingrese su email" value="<?=$_SESSION['usuario']['email'];?>"></p>
                    <input type="submit" value="Actualizar" name="submint">
    </form>
    <?php borrarErrores(); ?>
</div>

<?php require_once 'includes/footer.php';?>