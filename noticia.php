<?php
session_start();

require_once 'modelo/noticias_modelo.php';
require_once 'modelo/comentarios_modelo.php';

$noticiaModelo = new Noticias_modelo();
$comentarioModelo = new Comentarios_modelo();

// Obtén el ID de la noticia de la URL
$idNoticia = $_GET['id'];

// Usa el ID para obtener los datos de la noticia
$noticia = $noticiaModelo->get_noticia_por_id($idNoticia);

// Obtén los comentarios de la noticia
$comentarios = $comentarioModelo->get_comentarios($idNoticia);


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/css/style.css">
  <title>RescueFilms -
    <?php echo $noticia['encabezado']; ?>
  </title>
  <script src="https://kit.fontawesome.com/e6857ae1ca.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.7.0.min.js"
    integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script defer src="assets/js/app.js"></script>
  <script defer src="assets/js/script.js"></script>
  <style>
    body>div {
      min-height: calc(100vh - 136px) !important;
    }

    #header>div {
      background-color: rgb(41, 50, 60) !important;
    }

    .card {
      border-radius: 15px;
    }

    .btn-danger {
      border-radius: 15px;
    }

    .btn-primary {
      border-radius: 15px;
    }

    body>div {

      width: auto !important;
      display: block !important;
    }

    body>div>h1 {
      margin-top: 200px;
    }

    p {
      margin-top: 0px !important;
    }

    body>div>img {
      width: auto !important;
    }

    #borrar-form>button {
      background: #C70039 !important;
      font-size: 12px !important;
      color: #ffffff !important;
    }

    #formularioComentario>div>label {
      font-size: 20px;
      margin-top: 20px;
    }

    textarea#textoComentario {
      min-height: calc(2.5em + 1rem + calc(var(--bs-border-width) * 50)) !important;
      font-size: 18px;
    }

    #formularioComentario>button {
      font-size: 16px;
      padding: 10px;
    }

    .img-fluida {
      max-width: 100%;
      height: auto;
      border: 2px solid #000;
      border-radius: 15px; 
      box-shadow: 5px 5px 15px rgba(0,0,0,0.5);
      /* centrar imagen */
      display: block;
      margin-left: auto;
      margin-right: auto;
    }

  </style>
</head>

<body>

  <?php
  require_once("./vista/menu_vista.php");
  ?>

  <div class="container py-5">
    <h1 class="mb 4 display-4 text-muted fw-bold">
      <?php echo $noticia['encabezado']; ?>
    </h1>
    <br>
    <p class="text-justify mb-3">
      <?php echo $noticia['cuerpo']; ?>
    </p>
    <br>
    <img src="./assets/img/<?php echo $noticia['img']; ?>" alt="<?php echo $noticia['encabezado']; ?>" class="img-fluida mb-3 rounded" alt="<?php echo $noticia['encabezado']; ?>" class="img-fluid mb-3 rounded">
    <br>
    <p class="text-muted"><small>Publicado por:
        <?php echo $noticia['nombreUsuario']; ?>
      </small></p>

    <h2 class="my-5">Comentarios</h2>
    <?php foreach ($comentarios as $comentario): ?>
      <div class="card shadow mb-4">
        <div class="card-body">
          <p class="comment-text">
            <?php echo $comentario['textoComentario']; ?>
          </p>
          <p class="text-muted">
            <small>Publicado por:
              <?php echo $comentario['nombreUsuario']; ?>
            </small>
            <small class="float-end">
              <?php echo date("d/m/y H:i", strtotime($comentario['fechaComentario'])); ?>
            </small>
          </p>
          <?php

          if (isset($_SESSION['id'])) {
            if ($_SESSION['id'] == $comentario['idUsuario']) {
              ?>
              <form id="borrar-form">
                <input type="hidden" name="id" value="<?php echo $comentario['id']; ?>">
                <br>
                <button type="submit" class="btn btn-danger borrar-btn">Eliminar</button>
              </form>
              <?php
            } else if ($_SESSION['rol'] == 1) {
              ?>
                <form id="borrar-form">
                  <input type="hidden" name="id" value="<?php echo $comentario['id']; ?>">
                  <br>
                  <button type="submit" class="btn btn-danger borrar-btn">Eliminar</button>
                </form>
              <?php

            }
          }

          ?>
          <?php
          $fecha = strtotime($comentario['fechaComentario']);
          $fechaFormateada = date("d/m/y", $fecha);
          $horaFormateada = date("H:i", $fecha);
          ?>
        </div>
      </div>



    <?php endforeach;

    if (isset($_SESSION['id'])) {

      ?>

      <form id="formularioComentario" method="POST">
        <input type="hidden" name="idNoticia" value="<?php echo $noticia['id']; ?>">
        <input type="hidden" name="idUsuario" value="<?php echo $_SESSION['id']; ?>">
        <div class="mb-3">
          <label for="textoComentario" class="form-label">Comenta tu opinión, <span class="text-primary">
              <?php echo $_SESSION['nombre']; ?>
            </span></label>
          <textarea id="textoComentario" name="textoComentario" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
      </form>
      <?php
    }else{
         echo '<p class="text-muted">Debes identificarte para comentar</p>';
    }
    ?>
  </div>

  <?php
  require_once("./vista/pie-pagina_vista.php");
  ?>
</body>

</html>

<script>
  $(document).ready(function () {
    $("#formularioComentario").on("submit", function (event) {
      event.preventDefault();

      // Recuperamos los valores del formulario
      let idNoticia = $(this).find("input[name='idNoticia']").val();
      let idUsuario = $(this).find("input[name='idUsuario']").val();
      let textoComentario = $(this).find("textarea[name='textoComentario']").val();

      // Ejecutamos la solicitud AJAX
      $.ajax({
        url: "modelo/crear_comentario.php",
        type: "POST",
        data: {
          idNoticia: idNoticia,
          idUsuario: idUsuario,
          textoComentario: textoComentario
        },
        success: function (response) {
          // Imprimimos la respuesta para depuración
          console.log('Response:', response);

          if (response.trim() === "success") {
            Swal.fire({
              icon: 'success',
              title: '¡Comentario publicado!',
              text: 'Tu comentario ha sido publicado con éxito.',
            }).then((result) => {
              // Recargamos la página para ver el nuevo comentario
              location.reload();
            });
          } else {
            Swal.fire({
              icon: 'error',
              title: 'Error!',
              text: 'Hubo un error al publicar tu comentario.',
            });
          }
        },
        error: function (jqXHR, textStatus, errorThrown) {
          // Imprimimos el error para depuración
          console.log('Error:', textStatus, errorThrown);

          Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: 'Hubo un error al publicar tu comentario. Error',
          });
        }
      });
    });

    // Eliminar comentario
    $(".borrar-btn").on("click", function (event) {
      event.preventDefault();  // Agregado para prevenir la acción por defecto del botón

      let id = $(this).closest("form").find("input[name='id']").val();
      let row = $(this).closest("div.card.mb-3");  // Actualizado para seleccionar el contenedor del comentario

      $.ajax({
        url: "modelo/eliminar_comentario.php",
        type: "POST",
        data: { id: id },
        success: function (response) {
          console.log(response);
          if (response.trim() === "success") {  // Asegúrate de que la respuesta es "success" sin espacios adicionales
            Swal.fire({
              icon: 'success',
              title: '¡Comentario eliminado!',
              text: 'El comentario ha sido eliminado con éxito.',
            }).then((result) => {
              // Recargamos la página para eliminar el comentario
              location.reload();
            });
          } else {
            Swal.fire({
              icon: 'error',
              title: 'Error!',
              text: 'Hubo un error al eliminar el comentario.',
            });
          }
        },
        error: function (jqXHR, textStatus, errorThrown) {
          console.log('Error:', textStatus, errorThrown);
          Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: 'Hubo un error al eliminar el comentario. Error',
          });
        }
      });
    });
  });


</script>