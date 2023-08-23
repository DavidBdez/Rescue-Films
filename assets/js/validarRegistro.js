        // Añadir expresiones regulares para validar que el nombre de usuario no tenga ni espacios ni caracteres especiales
        const nombreRegex = /^[a-zA-Z0-9\_\-]{3,16}$/;

        // Añadir expresiones regulares para validar que la contraseña tenga al menos 8 caracteres, una mayúscula, una minúscula y un número
        const passwdRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/;

        // Validar que el nombre de usuario cumple con las expresiones regulares

        $("#nombre-registro").on("keyup", function() {
            const nombre = $("#nombre-registro").val();
            if (nombreRegex.test(nombre)) {
                $("#nombre-registro").css("border", "2px solid green");
                $("#errorMessageUsuario").text("");
            } else {
                $("#nombre-registro").css("border", "2px solid red");
                $("#errorMessageUsuario").text("El nombre de usuario no es válido. (Mínimo 3 caracteres, máximo 16, sin espacios ni caracteres especiales)");
            }

        });

        // Validar que la contraseña cumple con las expresiones regulares

        $("#passwd-registro").on("keyup", function() {
            const passwd = $("#passwd-registro").val();
            if (passwdRegex.test(passwd)) {
                $("#passwd-registro").css("border", "2px solid green");
                $("#errorMessagePassword").text("");
                
            } else {
                $("#passwd-registro").css("border", "2px solid red");
                $("#errorMessagePassword").text("La contraseña no es válida. (Mínimo 8 caracteres, una mayúscula, una minúscula y un número)");
            }
        
        });

        // Controlar que el formulario no se envíe si no se cumplen las expresiones regulares

        $("#registro-form").on("submit", function(e) {
            const nombre = $("#nombre-registro").val();
            const passwd = $("#passwd-registro").val();
            if (!nombreRegex.test(nombre) || !passwdRegex.test(passwd)) {
                e.preventDefault();
                alert("El formulario no se puede enviar porque no se cumplen las expresiones regulares.");
                response.trim() === "false";
            }
        });

         // Función para manejar el registro de usuarios (envío del formulario)
         $("#registro-form").on("submit", function(e) {
            e.preventDefault();
            const formData = $(this).serialize();

            $.ajax({
                type: "POST",
                url: "modelo/registrar_usuario.php",
                data: formData,
                success: function(response) {
                    console.log(response);
                    if (response.trim() === "success") {
                        // Redirigir al index
                        window.location.href = "index.php";
                    } else if (response.trim() === "usuario_existe") {
                        alert("El nombre de usuario ya existe.");
                    } else if (response.trim() === "correo_existe") {
                        alert("El correo electrónico ya está en uso.");
                    } else {
                        alert("Error al añadir el usuario.");
                        console.log(response);
                    }
                }
            });

    });