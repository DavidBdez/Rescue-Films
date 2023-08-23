<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"> -->
    <title>Sobre Nosotros</title>
    <script src="https://kit.fontawesome.com/e6857ae1ca.js" crossorigin="anonymous"></script>
    <script defer src="./assets/js/app.js"></script>
    <script defer src="./assets/js/script.js"></script>
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
    </style>
</head>

<body>
    <?php
    require_once("menu_vista.php");
    ?>

    <main id="main-content">
        <section class="sobre-nosotros_1">
            <div class="sobre responsive-grid">
                <div class="img-container">
                    <img src="./assets/img/abt-1.jpg" class="img-sobre responsive-img">
                </div>                
                <div class="texto">
                    <h2>Pablo Bernalte Tébar</h2>
                    <h5>Veterinario y naturalista <span id="span_tittle">apasionado por la educación ambiental</span>
                    </h5>
                    <p>Soy Pablo Bernalte Tébar, estudiante de veterinaria y naturalista dedicado a
                        la conservación de la vida silvestre. Mi pasión por los animales me ha llevado
                        a dedicarme al rescate de animales en situaciones difíciles, compartiendo estas
                        experiencias a través de mi contenido. He tenido la oportunidad de rescatar a
                        una gran variedad de especies, siempre con un profundo
                        respeto y entendimiento de su naturaleza salvaje. Mi objetivo es no solo compartir
                        estos rescates, sino también educar sobre la importancia de respetar y cuidar
                        nuestra fauna silvestre. Sígueme en mis aventuras y descubre la belleza y la
                        importancia de la vida silvestre a nuestro alrededor.</p>
                    <div class="datos">
                        <a href="mailto:bernawildlife@gmail.com" class="contactar">Contacto</a>
                    </div>
                    <div class="social-icons">
                        <a href="https://www.instagram.com/bernawildlife/" target="_blank" class="social-icon" data-after="Instagram">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                        <a href="https://www.tiktok.com/@bernawildlife" target="_blank" class="social-icon" data-after="TikTok">
                             <i class="fa-brands fa-tiktok"></i>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section class="sobre-nosotros_2">
            <div class="sobre responsive-grid">
                <div class="img-container">
                    <img src="./assets/img/abt-2.jpg" class="img-sobre responsive-img">
                </div>
                <div class="texto">
                    <h2>Alonso López Cerdán</h2>
                    <h5>Veterinario y naturalista <span id="span_tittle">apasionado por la educación ambiental</span>
                    </h5>
                    <p>Alonso López Cerdán es un apasionado de los animales y la naturaleza desde su
                        infancia. Estudiante de medicina veterinaria, Alonso ha dedicado su vida a
                        explorar y entender la fauna y la flora que nos rodea. En 2015, su camino se
                        cruzó con el de Pablo Bernalte, compartiendo una pasión común por el conocimiento
                        y la conservación de la naturaleza. Juntos, decidieron unir fuerzas para combatir
                        uno de los mayores enemigos de la naturaleza y la conservación: la ignorancia y la falta
                        de conocimientos.
                        <br>
                        <br>
                        En 2023, Alonso y Pablo crearon el proyecto Rescuefilms, con el objetivo
                        de desmentir mitos y desinformación sobre los animales y la comprensión de
                        su importancia en el entorno natural. Su contenido está dirigido a todos
                        los públicos, pero con especial atención a los jóvenes, a quienes consideran
                        el pilar fundamental sobre el que se sostendrá la conservación futura.
                       
                    </p>
                    <div class="datos">
                        <a href="mailto:aloubicas9@gmail.com" class="contactar">Contacto</a>
                    </div>
                    <div class="social-icons">
                        <a href="https://www.instagram.com/aloreptile_photography/" target="_blank" class="social-icon" data-after="Instagram">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php
    require_once("pie-pagina_vista.php");
    ?>
</body>

</html>