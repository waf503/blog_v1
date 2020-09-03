<?php
   

    if(isset($_POST)){
       
        if(!isset($_SESSION)){
            session_start();
        }
        //Conexion a la base de datos
        require_once 'includes/conexion.php';

        //REcogiendo los valores del formulario de actualizacion
        $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;
        $apellido = isset($_POST['apellido']) ? mysqli_real_escape_string($db, $_POST['apellido']) : false;
        $email = isset($_POST['email']) ? mysqli_real_escape_string($db, trim($_POST['email'])) : false;

        //Array de errores
        $errores = array();


        //validando datos antes de guardarlos a los datos

        //Validando nombre
        if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/",$nombre)){
            $nombre_validado = true;
        }else{
            $nombre_validado = false;
            $errores['nombre'] ="El nombre no es valido";
        }
        //validando apellido
        if(!empty($apellido) && !is_numeric($apellido) && !preg_match("/[0-9]/",$apellido)){
            $apellido_validado = true;
        }else{
            $apellido_validado = false;
            $errores['apellido'] = "El apellido no es valido";
        }

        //Validando email

        if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
            $email_validado = true;
        }else{
            $errores['email'] = "el email no es valido";
        }

      

        $guardar_usuario = false;
        if(count($errores)==0){
            //Insertar usuario en la tabla de usuarios
            $guardar_usuario = true;
            $usuario = $_SESSION['usuario'];

            //Comprobar si email existe
            $sql2 = "SELECT id, email from usuarios where email = '$email'";
            $isset_email = mysqli_query($db, $sql2);
            $isset_user = mysqli_fetch_assoc($isset_email);

            if($isset_user['id'] == $usuario['id'] || empty($isset_user)) {

                

                
                //update
                
                $sql = "UPDATE usuarios SET ".
                        "nombre = '$nombre', ".
                        "apellido = '$apellido', ".
                        "email = '$email' ".
                        "WHERE id = ".$_SESSION['usuario']['id'];

                $guardar = mysqli_query($db, $sql);
            

                if($guardar){
                    $_SESSION['usuario']['nombre'] = $nombre;
                    
                    $_SESSION['usuario']['apellido'] = $apellido;
                    
                    $_SESSION['usuario']['email'] = $email;
                    
                    $_SESSION['completado'] ="Usuario actualizado correctamente";
                }else{
                    $_SESSION['errores']['general'] = "Fallo al actualizar usuario!";
                }
            }else{
                $_SESSION['errores']['general'] = "El Usuario ya existe!";

            }
        }
        else{
            //No se inserta
            $_SESSION['errores'] = $errores;
            

        }

        
    }
header('Location: mis_datos.php');
?>