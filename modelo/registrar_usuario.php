<?php
require_once("usuarios_modelo.php");

if (isset($_POST['nombre']) && isset($_POST['passwd']) && isset($_POST['correo']) && isset($_POST['rol'])) {
    $nombre = $_POST['nombre'];
    $passwd = $_POST['passwd'];
    $correo = $_POST['correo'];
    $rol = 0;

    $usuario = new Usuarios_modelo();

    // Comprueba si el usuario o el correo ya existen
    if ($usuario->usuario_existe($nombre)) {
        echo "usuario_existe";
        exit();
    }
    if ($usuario->correo_existe($correo)) {
        echo "correo_existe";
        exit();
    }

    // Si no existen, intenta registrar el usuario
    if ($usuario->registrar_usuario($nombre, $passwd, $correo, $rol)) {
        echo "success";
    } else {
        echo "error";
    }
}
?>