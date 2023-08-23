<?php
require_once './modelo/conectar.php';
$conexion = Conectar::conexion();

$sql = "SELECT noticias.id, noticias.*, usuarios.nombre as nombreUsuario FROM noticias 
        LEFT JOIN usuarios ON noticias.subidaPor = usuarios.id";
$resultado = $conexion->query($sql);

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"> -->
  <title>RescueFilms</title>
  <script src="https://kit.fontawesome.com/e6857ae1ca.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <style>
    .stage {
      padding: 40px;
      text-align: center;
      margin-top: -35px;
      margin-bottom: -35px;
      margin-left: -40px;
    }

    .stage a {
      line-height: 1em;
      letter-spacing: 0.06em;
      font-family: 'Lato', sans-serif;
      font-weight: normal;
      font-size: 16px;
      text-decoration: none;
      color: #fff;
      background: #609AA6;
      display: inline-block;
      padding: 15px 12px 15px 15px;
      transition: background 200ms;
      border-radius: 4px;
    }

    .stage a:hover {
      background: #42A77F;
    }

    .stage a:after {
      font-family: 'FontAwesome', sans-serif;
      font-weight: 300;
      content: "\f105";
      margin-left: 20px;
      color: #3B575D;
      font-size: 18px;
      vertical-align: middle;
      transition: color 200ms;
    }

    .stage a:hover:after {
      color: #3B575D;
    }

    .project-text {
      display: -webkit-box;
      -webkit-line-clamp: 3;
      -webkit-box-orient: vertical;
      overflow: hidden;
      text-overflow: ellipsis;
    }


    div.project-info>div>form {
      display: grid;
      margin-top: 10px;
    }

    button.btn.btn-danger.borrar-btn {
        background-color: #dc3545;
    }

    button.btn.btn-danger.borrar-btn {
      font-size: 1.5em !important;
      padding: 7px; 
    
    }

  </style>
</head>

<body>
  <?php
  require_once("menu_vista.php");
  ?>

  <!-- Banner -->
  <section id="hero">
    <div class="hero container">
      <div>
        <h1>Conservación <span></span></h1>
        <h1>y divulgación de naturaleza<span></span></h1>
        <h1> Rescate de fauna salvaje<span></span></h1>
        <a href="#about" type="button" class="cta">Saber más</a>
      </div>
    </div>
  </section>
  <!-- Fin banner -->

  <!-- Sobre nosotros -->



  <section id="about">
    <div class="about container">
      <div class="col-left">
        <div class="about-img">
          <img src="assets/img/about-us-bg.jpeg" alt="img">
        </div>
      </div>
      <div class="col-right">
        <h1 class="section-title">Sobre <span>nosotros</span></h1>
        <h2><strong>Rescuefilms Project</strong></h2>
        <p>Somos Alonso López y Pablo Bernalte, veterinarios y naturalistas apasionados por la educación ambiental.
          Fundamos Rescuefilms project en 2023 con la misión de combatir la ignorancia en torno a la naturaleza. Nuestro
          enfoque se centra en desmentir mitos y resaltar la importancia de los animales en el medio ambiente. Nos
          dirigimos a todos los públicos, poniendo especial énfasis en la juventud, ya que son el pilar fundamental para
          la conservación futura.
          11
          Creemos firmemente en la educación ambiental como herramienta esencial para el sostenimiento del ecosistema.
          Estamos orgullosos de contar con el apoyo de colaboradores comprometidos y de inspirar a otros a través de
          nuestro contenido. ¡Únete a nosotros en esta apasionante aventura hacia un futuro más sostenible y en armonía
          con la naturaleza!</p>
        <a href="index.php?controlador=sobre-nosotros" class="cta">Conocenos</a>
      </div>
    </div>
  </section>
  <!-- Fin sobre nosotros -->

  <!-- Projectos -->
  <section id="projects">
    <div class="projects container">
      <div class="projects-header">
        <h1 class="section-title">Proyectos <span>recientes</span></h1>
      </div>
      <div class="row">
        <?php
        while ($row = $resultado->fetch_array(MYSQLI_ASSOC)) {
          ?>
          <div class="all-projects">
            <div class="project-item">
              <div class="project-info">
                <h1>
                  <?php echo $row['encabezado']; ?>
                </h1>
                <p class="project-text">
                  <?php echo $row['cuerpo']; ?>
                </p>
                <p class="card-text"><small class="text-muted">Autor:
                    <?php echo $row['nombreUsuario']; ?>
                  </small></p>
                <div class="stage">
                  <a href="noticia.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Leer más</a>
                  <?php
                  if (isset($_SESSION['nombre']) && $_SESSION['rol'] == 1) {
                    ?>
                    <form action="./modelo/eliminar_noticia.php" method="POST" class="formularioEliminar">
                      <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                      <button type="submit" class="btn btn-danger borrar-btn">Borrar</button>
                    </form>
                  <?php } ?>
                </div>
              </div>
              <div class="project-img">
                <img src="./assets/img/<?php echo $row['img']; ?>" alt="img">
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </section>


  <!-- Youtube  -->
  <section id="youtube">
    <div class="youtube-container">
      <div class="youtube-top">
        <h1 class="section-title">RescueFilms <span class="project"> Project</span> </h1>
      </div>

      <div class="youtube-bottom">
        <!-- Contenedor para el video de YouTube -->
        <div class="video-container">
          <!-- Insertamos el iframe de YouTube, utilizando el enlace de YouTube -->
          <iframe width="560" height="315" src="https://www.youtube.com/embed/85JHYdEwhGo?start=1"
            title="YouTube video player" frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </section>
  <!-- Fin youtube -->


  <!-- Contacto -->
  <section id="contact">
    <div class="contact container">
      <div>
        <h1 class="section-title">Contacto</h1>
      </div>
      <div class="contact-items">
        <div class="contact-item">
          <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/phone.png" alt="phn-icon" /></div>
          <div class="contact-info">
            <h1>Teléfono</h1>
            <h2>+34 727 716 257</h2>
          </div>
        </div>
        <div class="contact-item">
          <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/new-post.png" alt="mail-icon" /></div>
          <div class="contact-info">
            <h1>Email</h1>
            <h2>rescuefilmsproject@gmail.com</h2>
          </div>
        </div>
        <div class="contact-item">
          <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/map-marker.png" alt="drc-icon" /></div>
          <div class="contact-info">
            <h1>Dirección</h1>
            <h2> calle Álamo, 23, 1B, 02006. Albacete, España.</h2>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Fin contacto -->



  <?php
  require_once("pie-pagina_vista.php");
  ?>



</body>

<script>


  $(document).ready(function () {
    // Función para manejar la eliminación
    $(".formularioEliminar").on("submit", function (event) {
      event.preventDefault();

      let id = $(this).find("input[name='id']").val();
      let form = $(this);

      Swal.fire({
        title: '¿Estás seguro?',
        text: "No podrás deshacer esta acción",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, borrar',
        cancelButtonText: 'No, cancelar'
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            url: "./modelo/eliminar_noticia.php",
            type: "POST",
            data: {
              id: id
            },
            success: function (response) {
              console.log(response);
              if (response.trim() === "success") {
                form.closest('.col-lg-4').remove();
                Swal.fire(
                  'Eliminado!',
                  'La noticia ha sido eliminada.',
                  'success'
                  // Recarga la página
                ).then(function () {
                  location.reload();
                }
                )
              } else {
                Swal.fire(
                  'Error!',
                  'Hubo un error al eliminar la noticia.',
                  'error'
                )
              }
            }
          });
        }
      });
    });
  });

// Ultimo video de youtubee
    var channelID = "UCV9U6PfmG66quTf7uSVyk1g"; // Aquí pon el ID de tu canal
    var apiKey = "AIzaSyCyomOZnwrPfI3TuPi-XipK8RSCAcZpqJQ"; // Aquí pon tu clave API
    var videoMaxResult = 1; // Puedes cambiarlo si quieres más resultados
    var videoList = "https://www.googleapis.com/youtube/v3/search?key="+apiKey+"&channelId="+channelID+"&part=snippet,id&order=date&maxResults="+videoMaxResult;

    $.getJSON(videoList,function(data){
        $.each( data.items, function( i, item ) {
            var videoEmbedCode = '<iframe src="https://www.youtube.com/embed/'+item.id.videoId+'" frameborder="0" allowfullscreen></iframe>';
            $('.video-container').html(videoEmbedCode);
        });
    });


</script>





</html>