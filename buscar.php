<?php require_once 'includes/helpers.php';?>
<?php require_once 'includes/conexion.php';?>


<?php
    if(!isset($_POST['busqueda'])){
        header("Location: index.php");
    }

?>

<?php require_once 'includes/cabecera.php';?>

    
    <!-- Aside -->
    <?php require_once 'includes/lateral.php'; ?>
    <!-- Caja principal -->
    <div id="principal">

       
         <h1>Busqueda: <?=$_POST['busqueda']?></h1>

        <!--LISTANDO ENTRADAS -->
        <?php 
            $entradas = getEntradas($db, null, null, $_POST['busqueda']);     
            if(!empty($entradas) && mysqli_num_rows($entradas) >= 1): 
                while($entrada = mysqli_fetch_assoc($entradas)):
                        
        ?>
                    <article class="entrada">
                    <a href="entrada.php?id=<?=$entrada['id']?>">
                        <h2><?=  $entrada['titulo']?></h2>
                    </a>
                    
                    
                    <span class="fecha">
                        <?=$entrada['categoria'].' | '.$entrada['fecha']?>
                        <br>
                        <?="By: ".$entrada['usuario'];?>

                    </span>
                    </br>   
                    <br>                                              
                    <p>
                    <?=substr($entrada['descripcion'], 0, 180)."..."?>                    
                    </p>
                        
                    </article>
                
        <?php 
                endwhile;
            else: 
        ?>
        <div class="alerta">No hay entradas en esta categoria</div>
        <?php 
        endif;
        ?>

        
        

     

    </div>

   
    
    
    <!-- Fin principal -->
    <!-- Pie de Pagina --> 
<?php require_once 'includes/footer.php';?>