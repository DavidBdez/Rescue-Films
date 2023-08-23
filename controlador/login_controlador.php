<?php
session_start(); // Mover esto al principio

require_once("./modelo/usuarios_modelo.php");

$usuarios_modelo = new Usuarios_modelo();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $passwd = $_POST["passwd"];

    if ($usuarios_modelo->login($usuario, $passwd)) {
        $_SESSION["nombre"] = $usuario;
        header("Location: index.php");
        exit();
    } else {
        $mensaje_error = "Credenciales inválidas";
    }
}

// Mostrar la vista de inicio de sesión
require_once("./vista/login_vista.php");
?>

