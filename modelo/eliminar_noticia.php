<?php
require_once("noticias_modelo.php");

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $noticia = new Noticias_modelo();

    if ($noticia->borrar_noticia($id)) {
        // Asegúrate de que no hay espacios ni otros caracteres antes de 'success'
        echo "success";
        exit;
    } else {
        echo "error";
        exit;
    }
}
?>

