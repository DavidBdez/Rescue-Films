<?php

// Controlar que sólo pueda acceder a esta página el administrador

session_start();

if ($_SESSION['rol'] != 1) {
    header("Location: index.php");
} else {




    ?>



    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Imágenes</title>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
            crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <style>
            body {
                font-size: 20px;
            }

            input#nombre-registro,
            #passwd-registro,
            #correo-registro,
            #registro-form>button {
                font-size: 15px;
            }

            #header>div {
                background-color: rgb(41, 50, 60) !important;
            }

            .nav-list ul li a {
                font-size: 1.7rem !important;
            }

            body>h1 {
                margin-top: 220px;
            }

            #registro-form>h1 {
                float: left;
            }

            #registro-form>div:nth-child(2)>label {
                margin-top: 30px;
                margin-left: -170px;
            }

            .footer.container {
                margin-top: 310px;
            }


            #registro-form>div:nth-child(2) {
                margin-top: 200px;
            }
        </style>
    </head>

    <body>

        <?php

        require_once("menu_vista.php")

            ?>



        <h1>Usuarios</h1>

        <?php if (!empty($error)): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Contraseña</th>
                        <th>Correo</th>
                        <th>Rol</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($array_usuario as $usuario):

                        $rol = $usuario['rol'];

                        if ($rol == 1) {
                            $rol = "Administrador";
                        } else {
                            $rol = "Usuario";
                        }



                        ?>
                        <tr>
                            <td>
                                <?php echo $usuario['id']; ?>
                            </td>
                            <td>
                                <?php echo trim($usuario['nombre']); ?>
                            </td>
                            <td>
                                <?php echo trim($usuario['passwd']); ?>
                            </td>
                            <td>
                                <?php echo trim($usuario['correo']); ?>
                            </td>

                            <td>
                                <?php echo $rol; ?>
                            </td>
                            <!-- Añade IDs y cambia el tipo de botón a "button" -->
                            <td>
                                <button class="btn btn-primary modificar-btn"
                                    data-id="<?php echo $usuario['id']; ?>">Modificar</button>
                            </td>


                            <td>
                                <form id="borrar-form">
                                    <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">
                                    <input type="button" class="btn btn-danger borrar-btn" name="borrar" value="Borrar">
                                </form>
                            </td>

                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <br>
        <center>


            <?php if (!empty($error)): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>

            <!-- Formulario de modificación -->

            <form method="POST" action="" id="modificacion-form" style="display: none;">
                <h1>Modificar Usuario</h1>
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" id="nombre-modificacion" name="nombre" required>
                </div>
                <div class="mb-3">
                    <label for="passwd" class="form-label">Contraseña:</label>
                    <input type="password" class="form-control" id="passwd-modificacion" name="passwd" required>
                </div>
                <div class="mb-3">
                    <label for="correo" class="form-label">Correo:</label>
                    <input type="email" class="form-control" id="correo-modificacion" name="correo" required>
                </div>
                <div class="mb-3">
                    <label for="rol" class="form-label">Rol:</label>
                    <select class="form-control" id="rol-modificacion" name="rol" required>
                        <option value="0">Usuario</option>
                        <option value="1">Administrador</option>
                    </select>
                </div>

                <input type="hidden" name="id" id="id-modificacion" value="">
                <button type="submit" class="btn btn-primary" name="modifica">Modificar</button>
            </form>

            <!-- Formulario de registro -->

            <form method="POST" action="" id="registro-form">
                <h1>Añadir Usuario</h1>
                <div class="mb-3">
                    <label for="nombre-registro" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" id="nombre-registro" name="nombre" required>
                </div>
                <div class="mb-3">
                    <label for="passwd-registro" class="form-label">Contraseña:</label>
                    <input type="password" class="form-control" id="passwd-registro" name="passwd" required>
                </div>
                <div class="mb-3">
                    <label for="correo-registro" class="form-label">Correo:</label>
                    <input type="email" class="form-control" id="correo-registro" name="correo" required>
                </div>
                <input type="hidden" class="form-control" id="rol" name="rol" value="0" required>


                <button type="submit" class="btn btn-primary" name="registro">Añadir</button>
            </form>


        </center>

        <?php
        require_once("pie-pagina_vista.php");
        ?>
    </body>

    <script>
        $(document).ready(function () {
            // Función para manejar la modificación
            $(".modificar-btn").on("click", function () {
                $("#registro-form").hide();
                $("#modificacion-form").show();
                let id = $(this).data("id");

                // Rellenar el formulario de modificación con los datos actuales del usuario
                $("#id-modificacion").val(id);
                $("#nombre-modificacion").val($.trim($(this).closest("tr").find("td:nth-child(2)").text()));
                $("#passwd-modificacion").val($.trim($(this).closest("tr").find("td:nth-child(3)").text()));
                $("#correo-modificacion").val($.trim($(this).closest("tr").find("td:nth-child(4)").text()));
                $("#rol-modificacion").val($.trim($(this).closest("tr").find("td:nth-child(5)").text() === 'Administrador' ? 1 : 0));

            });

            // Función para manejar la eliminación
            $(".borrar-btn").on("click", function () {
                let id = $(this).closest("form").find("input[name='id']").val();
                let row = $(this).closest("tr");

                $.ajax({
                    url: "./modelo/eliminar_usuario.php",
                    type: "POST",
                    data: { id: id },
                    success: function (response) {
                        console.log(response);
                        if (response === "success") {
                            row.remove();
                        } else {
                            alert("Error al eliminar el usuario.");
                        }
                    }
                });
            });

            // Función para manejar el registro de usuarios (envío del formulario)
            $("#registro-form").on("submit", function (e) {
                e.preventDefault();
                const formData = $(this).serialize();

                $.ajax({
                    type: "POST",
                    url: "./modelo/registrar_usuario.php",
                    data: formData,
                    success: function (response) {
                        console.log(response);
                        if (response.trim() === "success") {
                            location.reload();
                        } else {
                            alert("Error al añadir el usuario.");
                        }
                    }
                });
            });

            // Función para manejar la modificación (envío del formulario)
            $("#modificacion-form").on("submit", function (e) {
                e.preventDefault();

                $.ajax({
                    url: "./modelo/modificar_usuario.php",
                    type: "POST",
                    data: $(this).serialize(),
                    success: function (response) {
                        console.log(response);
                        if (response === "success") {
                            $("#registro-form").show();
                            $("#modificacion-form").hide();
                            location.reload();
                        } else {
                            alert("Error al modificar el usuario.");
                        }
                    }
                });
            });



        });
    </script>




    </html>

    <?php

}

?>