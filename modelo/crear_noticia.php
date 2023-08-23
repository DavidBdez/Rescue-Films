<?php
require_once("noticias_modelo.php");

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST['encabezado'], $_POST['cuerpo'], $_FILES['img'])) {
    $encabezado = $_POST['encabezado'];
    $cuerpo = $_POST['cuerpo'];
    $subidaPor = $_SESSION['id'];
    $nombreImg = basename($_FILES["img"]["name"]);

    $target_dir = "../assets/img/";
    $target_file = $target_dir . $nombreImg;

    // Comprobar el tipo de archivo
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        echo "Solo se permiten archivos JPG, JPEG, PNG y GIF.";
        exit();
    }

    // Comprobar el tamaño del archivo
    if ($_FILES["img"]["size"] > 10000000) { // 10MB en bytes
        echo "El archivo es demasiado grande. El tamaño máximo permitido es 10MB.";
        exit();
    }

    if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
        echo "La imagen " . htmlspecialchars($nombreImg) . " ha sido subida.";
    } else {
        echo "Error al subir la imagen.";
    }

    $noticias = new Noticias_modelo();
    $noticias->crear_noticia($encabezado, $cuerpo, $nombreImg, $subidaPor);

    header("Location: ../");
} else {
    echo "El formulario no ha sido enviado aún.";
}
?>
