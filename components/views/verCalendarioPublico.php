
<?php

use yii\bootstrap4\Modal;

?>

<div id="modalContent"></div>

<div class="container">
   <div class="row py">
        <div id='calendar'></div>
    </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    var initialLocaleCode = 'es';
    var calendarEl = document.getElementById('calendar');

	var calendar = new FullCalendar.Calendar(calendarEl, {
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'multiMonthYear,dayGridMonth'
      },
      locale: initialLocaleCode,
      initialView: 'multiMonthYear',
      
      //initialDate: '2023-01-12',
      editable: false,
      selectable: false,
      dayMaxEvents: true, // allow "more" link when too many events
      // multiMonthMaxColumns: 1, // guarantee single column
      // showNonCurrentDates: true,
      //fixedWeekCount: false,
      // businessHours: true,
      // weekends: false,
      events: '/curso/events',
	      	eventClick: function(arg) { // Edit/Delete event
				var eventid = arg.event._def.extendedProps.eventid;

				$.ajax({
				url: '/curso/view-event', // Ruta a tu controlador Yii para obtener datos
				data: {_csrf:csrfToken, datos:{ id: eventid }},
				type: 'POST', // Método de solicitud
				async: false,
				success: function(data) {
					
	      			 // Cargar el contenido recibido en la solicitud AJAX dentro del cuerpo del modal
					$('#modalContent').off();

					$('#modalContent').html(data);
        
					$('#curso-modal').modal('show');
					
				},
				});
	      		
	      	}
    	});

    calendar.render();
  });
</script>