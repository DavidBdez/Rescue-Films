<?php
require_once("usuarios_modelo.php");

if (isset($_POST['id']) && isset($_POST['nombre']) && isset($_POST['passwd']) && isset($_POST['correo']) && isset($_POST['rol'])) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $passwd = $_POST['passwd'];
    $correo = $_POST['correo'];
    $rol = $_POST['rol'];

    $usuario = new Usuarios_modelo();

    if ($usuario->modificar_usuario($id, $nombre, $passwd, $correo, $rol)) {
        echo "success";
    } else {
        echo "error";
    }
}
?>
