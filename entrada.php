<?php require_once 'includes/helpers.php';?>
<?php require_once 'includes/conexion.php';?>




<?php
    $entrada_actual = getEntrada($db, $_GET['id']);
    
    if(!isset($entrada_actual['id'])){

        header("Location: index.php");
    } 
?>

<?php require_once 'includes/cabecera.php';?>

    
    <!-- Aside -->
    <?php require_once 'includes/lateral.php'; ?>
    <!-- Caja principal -->
    <div id="principal">

       
    <article class="entrada">

                    <h2><?=  $entrada_actual['titulo']?></h2>                   
                    
                    
                    <span class="fecha">
                        <?=$entrada_actual['categoria'].' | '.$entrada_actual['fecha']?>
                        <br>
                        <br>
                        <?=$entrada_actual['usuario'];?>
                    </span>
                    </br>   
                    <br>                                              
                    <p>
                        <?=$entrada_actual['descripcion']?>                    
                    </p>
                        
                    </article>
        <?php if(isset($_SESSION["usuario"]) && $_SESSION["usuario"]["id"] == $entrada_actual["usuario_id"]): ?>    
        <a href="editar_entrada?id=<?=$entrada_actual['id']?>" class="boton">Editar entrada</a>
        <a href="borrar_entrada?id=<?=$entrada_actual['id']?>" class="boton">Eliminar entrada</a>
        <?php endif; ?>    
   
    </div>

   
    
    
    <!-- Fin principal -->
    <!-- Pie de Pagina --> 
<?php require_once 'includes/footer.php';?>