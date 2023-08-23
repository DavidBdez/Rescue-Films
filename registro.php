<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regístrate</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<style>
    img#logo-login {
        margin-top: -95px;
        margin-bottom: -65px;
    }

    .card.shadow-lg {
        margin-top: -70px;
    }

    #errorMessage {
        color: red;
        font-weight: bold;
    }
</style>

<body>
    <section class="h-100">
        <div class="container h-100">
            <div class="row justify-content-sm-center h-100">
                <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
                    <div class="text-center my-5">
                        <img src="assets/img/logo.jpeg" id="logo-login" alt="logo" width="350">
                    </div>
                    <div class="card shadow-lg">
                        <div class="card-body p-5">
                            <h1 class="fs-4 card-title fw-bold mb-4">Registro</h1>
                            <form method="POST" class="needs-validation" action="" id="registro-form">
                                <div class="mb-3">
                                    <label class="mb-2 text-muted" for="nombre">Nombre</label>
                                    <input id="nombre-registro" type="text" class="form-control" name="nombre" required
                                        autofocus>
                                    <div id="errorMessageUsuario"></div>
                                </div>

                                <div class="mb-3">
                                    <label class="mb-2 text-muted" for="correo">Correo</label>
                                    <input id="correo-registro" type="email" class="form-control" name="correo" value=""
                                        required>
                                    <div class="invalid-feedback">
                                        Correo incorrecto
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="mb-2 text-muted" for="passwd">Contraseña</label>
                                    <input id="passwd-registro" type="password" class="form-control" name="passwd"
                                        required>
                                    <div id="errorMessagePassword"></div>
                                </div>
                                <input type="hidden" name="rol" value="0">

                                <p class="form-text text-muted mb-3">
                                    Al registrarte aceptas nuestros terminos y condiciones.
                                </p>

                                <div class="align-items-center d-flex">
                                    <button type="submit" class="btn btn-primary ms-auto"
                                        name="registro">Registrarme</button>

                                </div>
                            </form>
                        </div>
                        <form class="card-footer py-3 border-0" action="index.php">
                            <div class="text-center">
                                ¿Ya tienes una cuenta? <input type="submit" class="btn btn-link" value="Identificate">
                            </div>
                        </form>
                    </div>
                    <div class="text-center mt-5 text-muted">
                        Copyright &copy; 2023 &mdash; RescueFilms Project
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="assets/js/validarRegistro.js"></script>
</body>

</html>