<?php
session_start();
require_once("../modelo/noticias_modelo.php");

$noticia = new Noticias_modelo();
$error ="";
if(isset($_SESSION['nombre'])){
    $array_noticia = $noticia->get_noticias();
}
require_once("../vista/noticias_vista.php");
