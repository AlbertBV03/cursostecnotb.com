var csrfToken = $('meta[name=csrf-token]').attr('content');

//funciones ajax que asigna manuales a subcolecciones
function asignacion(ID) {
  var cursoID = $('input[name=cursoID]').val();
 // var solicitud = $('input[name=fksol]').val();
  $('#ventana').modal('hide');
  krajeeDialog.confirm("Está por asignar este usuario, está seguro de continuar?", function (result) {
    if (result) { // ok button was pressed
      $.post('/cursoinscrito/asignar', { _csrf: csrfToken, datos: { userID: ID, cursoID: cursoID } })
        .done(function (d) {
          if (d !== '0') {
            //var datos = JSON.parse(d);
            //krajeeDialog.alert('Se ha asignado tutor al Ciclo ' + datos.subcol);
            /* $.pjax.reload({ container: '#pjax_cursos' }); */
            //$('#ventana').modal('hide');
            window.location.reload();
          }
        }).fail(function (f) { console.log(f.responseText); });
    } else { // confirmation was cancelled
      krajeeDialog.alert('Operación Cancelada');
    }
  });

}