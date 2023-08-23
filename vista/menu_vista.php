<?php

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

if (!isset($_SESSION['nombre'])) {
  ?>


  <section id="header">
    <div class="header container">
      <div class="nav-bar">
        <div class="brand">
          <a href="./">
            <img src="./assets/img/logo-blanco-png-transformed.png" alt="Logo de Rescue Films" class="logo img-fluid">
          </a>
        </div>
        <div class="nav-list">
          <div class="hamburger">
            <div class="bar"></div>
          </div>
          <ul>
            <li><a href="./#hero" data-after="">Inicio</a></li>
            <li><a href="./#projects" data-after="">Proyectos</a></li>
            <li><a href="./index.php?controlador=sobre-nosotros" data-after="">Integrantes</a></li>
            <li><a id= "login" href="./index.php?controlador=login" data-after="">Iniciar sesión</a></li>
            
            <div class="nav-icons">
                <li><a aria-label="Send Email" href="mailto:rescuefilmsproject@gmail.com" target="_blank">
                    <i class="icon fa fa-envelope"></i>
                </a></li>
                <li><a href="https://www.instagram.com/rescuefilms_project/" target="_blank" data-after="Instagram"><i
                    class="fa-brands fa-instagram"></i></a></li>
                <li><a href="https://www.youtube.com/@rescuefilms_project" target="_blank" data-after="YouTube"><i
                    class="fa-brands fa-youtube"></i></a></li>
            </div>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <?php
} else if ($_SESSION['rol'] == 0) {


  ?>

    <section id="header">
      <div class="header container">
        <div class="nav-bar">
          <div class="brand">
            <a href="./">
              <img src="./assets/img/logo-blanco-png-transformed.png" alt="Logo de Rescue Films" class="logo img-fluid">
            </a>
          </div>
          <div class="nav-list">
            <div class="hamburger">
              <div class="bar"></div>
            </div>
            <ul>
              <li><a href="./#hero" data-after="">Inicio</a></li>
              <li><a href="./#projects" data-after="">Proyectos</a></li>
              <li><a href="index.php?controlador=sobre-nosotros" data-after="">Integrantes</a></li>
              <li><a href="./desconectar.php" data-after="Service">Desconectar</a></li>

              <div class="nav-icons">
                <li><a aria-label="Send Email" href="mailto:rescuefilmsproject@gmail.com" target="_blank">
                    <i class="icon fa fa-envelope"></i>
                </a></li>
                <li><a href="https://www.instagram.com/rescuefilms_project/" target="_blank" data-after="Instagram"><i
                    class="fa-brands fa-instagram"></i></a></li>
                <li><a href="https://www.youtube.com/@rescuefilms_project" target="_blank" data-after="YouTube"><i
                    class="fa-brands fa-youtube"></i></a></li>
            </div>
            </ul>
          </div>
        </div>
      </div>
    </section>

  <?php
} else if ($_SESSION['rol'] == 1) {

  ?>

      <section id="header">
        <div class="header container">
          <div class="nav-bar">
            <div class="brand">
              <a href="./#hero">
                <img src="./assets/img/logo-blanco-png-transformed.png" alt="Logo de Rescue Films" class="logo img-fluid">
              </a>
            </div>
            <div class="nav-list">
              <div class="hamburger">
                <div class="bar"></div>
              </div>
              <ul>
                <li><a href="./" data-after="">Inicio</a></li>
                <li><a href="index.php?controlador=nueva-noticia">Crear noticia</a></li>
                <li><a href="index.php?controlador=panel">Panel de administración</a></li>
                <li><a href="./desconectar.php">Desconectar</a></li>
              </ul>
            </div>
          </div>
        </div>
      </section>
  <?php

}

?>