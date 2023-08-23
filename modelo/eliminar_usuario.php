<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);




require_once("usuarios_modelo.php");

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $usuario = new Usuarios_modelo();

    if ($usuario->eliminar_usuario($id)) {
        echo "success";
    } else {
        echo "error";


    }
}
?>