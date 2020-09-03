<?php
//Iniciar la session y la conexion
require_once('includes/conexion.php');

//Borrando sesion antigua
if(isset($_SESSION['error_login'])){
    $_SESSION['error_login']=null;
}

//Recoger datos del formulario
if(isset($_POST)){
    $email = trim($_POST['email']);
    $pass = $_POST['clave'];

    

    //Comprobar la contrasenia
    $sql = "SELECT *FROM usuarios WHERE email = '$email'";
    $login = mysqli_query($db, $sql);

    if($login && mysqli_num_rows($login)==1){
        $usuario  = mysqli_fetch_assoc($login);

        //Comprobando contrasenia
        $verify = password_verify($pass, $usuario['clave']);
        if($verify){
            $_SESSION['usuario'] = $usuario;
            
            

        }else{

            $_SESSION['error_login'] = "Login incorrecto";
        }
    }else{
        $_SESSION['error_login'] = "Login incorrecto";
    }

}

//Redirigiendo
header('Location: index.php');


?>
