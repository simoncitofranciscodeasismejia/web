$(document).ready(function () {
  cargarNota(); // Cargar asistencia al cargar la página
});

function registrarNota() {
  var formData = $('#notaForm').serialize();

  $.ajax({
      type: 'POST',
      url: '../views/post/registrar_padre_estudiante.php',
      data: formData,
      dataType: 'json', // Asegúrate de que el servidor devuelva JSON
      success: function (response) {
          if (response.success) {
              cargarNota(); // Volver a cargar la asistencia después de registrar
              alert('Nota registrada con éxito.');
          } else {
              alert('Error: ' + response.message);
          }
      },
      error: function (xhr, status, error) {
        console.error('Error al registrar la nota:', status, error);
        console.log(xhr.responseText); // Muestra la respuesta completa
        alert('Ocurrió un error al registrar la nota. Inténtalo de nuevo.');
    }
  });
  console.log(formData);
}

function cargarNota() {
  var idPadre = obtenerIdPadre();
  $.ajax({
      type: 'GET',
      url: '../get/obtener_padre_estudiante.php?id=' + idPadre,
      dataType: 'html', // Asegúrate de que el servidor devuelva HTML
      success: function (data) {
          $('#asistenciaTabla').html(data);
      },
      error: function (xhr, status, error) {
          console.error('Error al cargar la asistencia:', status, error);
          alert('Ocurrió un error al cargar la asistencia. Inténtalo de nuevo.');
      }
  });
}

function obtenerIdPadre() {
  return $('#idPadre').val();
}
