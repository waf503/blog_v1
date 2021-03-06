<?php require_once 'includes/cabecera.php';?>

    
    <!-- Aside -->
    <?php require_once 'includes/lateral.php'; ?>
    <!-- Caja principal -->
    <div id="principal">
        <h1>Ultimas entradas</h1>

        <!--LISTANDO ENTRADAS -->
        <?php 
            $entradas = getEntradas($db,true);
            if(!empty($entradas)): 
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
                    <p>
                        <?=substr($entrada['descripcion'], 0, 180)."..."?>                    
                    </p>
                        
                    </article>
                
        <?php 
                endwhile;
            endif; 
        ?>

        
        

        <div id="ver-todas">
            <a href="entradas.php">Ver todas las entradas</a>
        </div>

    </div>

   
    
    
    <!-- Fin principal -->
    <!-- Pie de Pagina --> 
<?php require_once 'includes/footer.php';?>