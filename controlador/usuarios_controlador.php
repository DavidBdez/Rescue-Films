<?php
session_start();
require_once("modelo/usuarios_modelo.php");

$usuario = new Usuarios_modelo();
$error ="";
if(isset($_SESSION['nombre'])){
    $array_usuario = $usuario->get_usuarios();

}else{
    if(isset($_POST['enviar'])){ 
 $nombre = isset($_POST["usuario"])? $_POST['usuario']:' ';
 $contraseña = isset($_POST["contra"])? $_POST['contra']:' ';
 if($usuario -> login($nombre,$contraseña)){ 
     $_SESSION['usuario'] = $nombre; 
     $array_usuario = $usuario->get_usuarios();
 }else{
     $error ="Usuario o contraseña incorrectos";
 }
    }
}
require_once("./vista/usuarios_vista.php"); 
?>