<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        img#logo-login {
            margin-top: -40px;
            margin-bottom: -40px;
        }

        .card.shadow-lg {
            margin-top: -50px;
        }
    </style>
</head>

<body>


    <section class="h-100">
        <div class="container h-100">
            <div class="row justify-content-sm-center h-100">
                <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
                    <div class="text-center">
                        <img src="./assets/img/logo.jpeg" id="logo-login" alt="logo" width="350">
                    </div>
                    <div class="card shadow-lg">
                        <div class="card-body p-5">
                            <h1 class="fs-4 card-title fw-bold mb-4">Iniciar sesión</h1>

                            <?php if (isset($mensaje_error)): ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php echo $mensaje_error ?>
                                </div>
                            <?php endif ?>

                            <form method="POST" action="">

                                <div class="mb-3">
                                    <label class="mb-2 text-muted" for="email">Usuario</label>
                                    <input id="usuario" type="text" class="form-control" name="usuario" value=""
                                        required autofocus>
                                    <div class="invalid-feedback">
                                        Usuario incorrrecto
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="mb-2 w-100">
                                        <label class="text-muted">Contraseña</label>
                                        <!-- <a href="forgot.html" class="float-end">
                                            Forgot Password?
                                        </a> -->
                                    </div>
                                    <input id="password" type="password" class="form-control" name="passwd" required>
                                    <div class="invalid-feedback">
                                        La contraseña es obligatoria
                                    </div>
                                </div>

                                <div class="d-flex align-items-center">
                                    <div class="form-check">
                                        <input type="checkbox" name="remember" id="remember" class="form-check-input">
                                        <label for="remember" class="form-check-label">Recuerdame</label>
                                    </div>
                                    <input type="submit" class="btn btn-primary ms-auto" value="Iniciar sesión">
                                </div>
                            </form>
                        </div>
                        <form class="card-footer py-3 border-0" action="./registro.php">
                            <div class="text-center">
                                ¿No tienes una cuenta? <input type="submit" class="btn btn-link" value="Registrate">
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

</body>

</html>