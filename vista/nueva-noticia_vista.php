<?php

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

if (isset($_SESSION['nombre']) && $_SESSION['rol'] == 1) {


  ?>



  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>Noticias</title>
    <script src="https://kit.fontawesome.com/e6857ae1ca.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
      integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <style>
      html {
        font-family: 'Open Sans', sans-serif !important;
      }

      #header>div {
        background-color: rgb(41, 50, 60) !important;
      }

      .nav-list ul li a {
        font-size: 1.7rem !important;
      }

      .text-center.pb-3 {
        margin-top: -100px;
      }

      h2.display-5.mb-4 {
        font-size: 45px;
      }

      #crear-noticia>div {
        min-height: 0 !important;
        width: auto !important;
        display: block !important;
      }

      #crear-noticia>div>div>div {
        margin-top: 150px !important;
      }

      #crear-noticia>div>h2 {
        font-size: 50px;
      }

      label.form-label {
        font-size: 20px;
      }

      input[type="file"] {
        font-size: 20px;
      }

      #botonSubir {
        padding: 10px;
        font-size: 15px;
        margin-top: 5px;
      }
    </style>
  </head>

  <body>

    <?php
    require_once("menu_vista.php");
    ?>

    <section id="crear-noticia" class="py-5 bg-light">
      <div class="container">
        <div class="container d-flex flex-column align-items-center">
          <div class="card w-100">
            <div class="card-body">
              <h2 class="display-5 mb-4">Crear noticia</h2>
              <form action="./modelo/crear_noticia.php" method="POST" enctype="multipart/form-data" id="formCrearNoticia">
                <input type="hidden" name="accion" value="crear">
                <div class="mb-3">
                  <label for="encabezado" class="form-label">Encabezado:</label>
                  <input type="text" id="encabezado" name="encabezado" class="form-control" required>
                </div>
                <div class="mb-3">
                  <label for="cuerpo" class="form-label">Cuerpo de la noticia:</label>
                  <textarea id="cuerpo" name="cuerpo" class="form-control" required></textarea>
                </div>
                <div class="mb-3">
                  <label for="imagen" class="form-label">Imagen:</label>
                  <input type="file" id="img" name="img" class="form-control" required>
                </div>
                <button type="submit" name="subir" class="btn btn-primary" id="botonSubir">Subir</button>
              </form>
            </div>
          </div>
        </div>
    </section>

    <?php
    require_once("pie-pagina_vista.php");
    ?>
  </body>

  <script>
    $(document).ready(function () {
      $('#botonSubir').on('click', function (e) {
        e.preventDefault(); // previene el envío automático del formulario

        var encabezado = $('#encabezado').val();
        var cuerpo = $('#cuerpo').val();
        var img = $('#img').val();

        if (encabezado == "" || cuerpo == "" || img == "") {
          Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Todos los campos son obligatorios'
          });
        } else {
          Swal.fire({
            icon: 'success',
            title: 'Exito',
            text: 'Noticia creada correctamente'
          });

          // Después de la validación, puedes enviar el formulario manualmente si todo está correcto
          // Nota: Asegúrate de manejar la validación de la imagen en el lado del servidor también
          $('form').submit();
        }
      });
    });
  </script>

  </html>

  <?php

} else {
  header('Location: ./');
}

?>