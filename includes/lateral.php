<!-- Barra Lateral -->


<aside id="sidebar">

        <!-- Usuario logueado-->
        <?php if(isset($_SESSION['usuario'])): ?>
            <div id="usuario-logeado" class="block-aside">
                <h3><?php echo "<h3>Bienvenido ".$_SESSION['usuario']['nombre'].' '.$_SESSION['usuario']['apellido']."</h3>"; ?></h3>
                <!--Botones para cerrar sesion-->

                <a href="crear_entradas.php" class="boton">Crear Entradas</a>
                <a href="crear_categoria.php" class="boton">Crear Categoria</a>
                <a href="mis_datos.php" class="boton">Mis datos</a>
                <a class="boton" href="logout.php">Cerrar Sesion</a>

            </div>
        <?php endif; ?>
        <?php if(!isset($_SESSION['usuario'])): ?>
            <div id="login" class="block-aside">
                <h3>Ingresar</h3>
                <!--Mostrar errores de session-->
                <?php if(isset($_SESSION['error_login'])):?>
                    <div class="alerta alerta-error">
                        <?=$_SESSION['error_login'];?>
                    </div>
                <?php endif; ?>    


                <form action="login.php" method="POST">
                    <p><input type="email" name="email" id="email" placeholder="Ingrese su email"></p>
                    <p><input type="password" name="clave" id="clave" placeholder="Ingrese su clave"></p>
                    <input type="submit" value="Iniciar sesion">
                </form>

            </div>
            <div id="register" class="block-aside">
                

                <h3>Resgistrate</h3>

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
                

                <form action="registro.php" method="POST">
                    <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre') : ''; ?>
                    <p><input type="text" name="nombre" id="nombre" placeholder="Nombre"></p>
                    <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellido') : ''; ?>
                    <p><input type="text" name="apellido" id="apellido" placeholder="Apellido"></p>
                    <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email') : ''; ?>
                    <p><input type="email" name="email" id="email" placeholder="Ingrese su email"></p>
                    <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'password') : ''; ?>
                    <p><input type="password" name="clave" id="clave" placeholder="Ingrese su clave"></p>
                    <input type="submit" value="Registrar" name="submint">
                </form>
                <?php borrarErrores() ?>
            </div>
        <?php endif; ?>
    </aside>