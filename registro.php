<?php
   

    if(isset($_POST)){
        if(!isset($_SESSION)){
            session_start();
        }
        require_once 'includes/conexion.php';
        //REcogiendo los valores del formulario registro por post
        $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;
        $apellido = isset($_POST['apellido']) ? mysqli_real_escape_string($db, $_POST['apellido']) : false;
        $email = isset($_POST['email']) ? mysqli_real_escape_string($db, trim($_POST['email'])) : false;
        $clave = isset($_POST['clave']) ? mysqli_real_escape_string($db,$_POST['clave']) : false;

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

        if(!empty($clave)){
            $clave_validada = true;
        }else{
            $errores['clave'] = "Debe rellenar el campo de la contraseña";
        }

        $guardar_usuario = false;
        if(count($errores)==0){
            //Insertar usuario en la tabla de usuarios
            $guardar_usuario = true;
            //Cifrar contraseña
            $password_segura = password_hash($clave, PASSWORD_BCRYPT, ['cost'=>4]);
            $sql = "INSERT INTO usuarios VALUES (null, '$nombre', '$apellido', '$email', '$password_segura', CURDATE());";

            $guardar = mysqli_query($db, $sql);
            
            
            

            if($guardar){
                $_SESSION['completado'] ="El registro se ha completado con exito";
            }else{
                $_SESSION['errores']['general'] = "Fallo al guardar usuario!";
            }

        }
        else{
            //No se inserta
            $_SESSION['errores'] = $errores;
            

        }

        
    }
header('Location: index.php');
?>