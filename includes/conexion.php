<?php
//Conectar a la base de datos

//Variables de conexion

$server = 'localhost';
$username = 'root';
$password = '';
$database = 'blog';
$port = '3308';

$db = mysqli_connect($server,$username,$password,$database,$port);

if(mysqli_connect_errno()){
    echo "<small>La conexion a la base a fallado: </small>".mysqli_connect_error();
}
else{
}
mysqli_query($db, "SET NAMES 'utf8' ");

//Iniciar la sesion
if(!isset($_SESSION)){
    session_start();
}