<?php require_once 'includes/cabecera.php';?>

    
    <!-- Aside -->
    <?php require_once 'includes/lateral.php'; ?>
    <!-- Caja principal -->
    <div id="principal">
        <h1>Ultimas entradas</h1>

        <!--LISTANDO ENTRADAS -->
        <?php 
            $entradas = getEntradas($db);
            if(!empty($entradas)): 
                while($entrada = mysqli_fetch_assoc($entradas)):
                        
        ?>
                    <article class="entrada">
                    <a href="#">
                        <h2><?=  $entrada['titulo']?></h2>
                    </a>
                    
                    
                    <span class="fecha">
                        <?=$entrada['categoria'].' | '.$entrada['fecha']?>
                    </span>
                    </br>   
                    <br>                                              
                    <p>
                        <?= $entrada['descripcion']?>
                    </p>
                        
                    </article>
                
        <?php 
                endwhile;
            endif; 
        ?>

        
        

        <div id="ver-todas">
            <a href="#">Ver todas las entradas</a>
        </div>

    </div>

   
    
    
    <!-- Fin principal -->
    <!-- Pie de Pagina --> 
<?php require_once 'includes/footer.php';?>