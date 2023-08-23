<?php


require_once("./modelo/usuarios_modelo.php");

$conn = new Usuarios_modelo();

$array_usuario = $conn->get_usuarios();

?>