<?php require_once 'conexion.php';?>
<?php require_once 'includes/helpers.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/estilos.css"> 
    <title>Blog de video juegos</title>
</head>
<body>
    <!-- Cabecera -->
    <header id="cabecera">
        <div id="logo"> 
            <a href="index.php">
                El Blog de Wilmer
            </a>
        </div>

    <!-- Menu-->

    <nav id="nav">
        <ul>
            <li><a href="index.php">Inicio</a></li>   
            <!-- Imprimiendo categorias -->
            <?php $categorias = getCategorias($db);?>
            <?php if(!empty($categorias)):?>
                <?php while($categoria = mysqli_fetch_assoc($categorias)):?>
                    <li><a href="#"><?=$categoria['nombre']?></a></li>
                <?php endwhile ?>
            <?php endif; ?>
   
            <li><a href="">Sobre mi</a></li>  
            <li><a href="">Contacto</a></li>   
 

        </ul>
    </nav>

    <div class="clearfix">

    </div>

    </header>
    <div id="container">