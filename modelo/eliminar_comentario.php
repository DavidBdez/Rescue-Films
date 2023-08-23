<?php
require_once("comentarios_modelo.php");

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $comentario = new Comentarios_modelo();

    if ($comentario->borrar_comentario($id)) {
        echo "success";
    } else {
        echo "error";
    }
}
?>