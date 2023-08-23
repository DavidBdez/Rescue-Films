$(document).ready(function() {
    // Función para manejar la eliminación
    $(".formularioEliminar").on("submit", function(event) {
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
            success: function(response) {
              console.log(response);
              if (response.trim() === "success") {
                form.closest('.col-lg-4').remove();
                Swal.fire(
                  'Eliminado!',
                  'La noticia ha sido eliminada.',
                  'success'
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