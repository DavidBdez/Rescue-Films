<?php

require_once("comentarios_modelo.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['idNoticia'], $_POST['idUsuario'], $_POST['textoComentario'])) {
        $modelo = new Comentarios_modelo();
        $resultado = $modelo->crear_comentario($_POST['idNoticia'], $_POST['idUsuario'], $_POST['textoComentario']);
        
        if ($resultado) {
            echo "success";
        } else {
            echo "error";
        }
    } else {
        echo "error";
    }
}

?>

