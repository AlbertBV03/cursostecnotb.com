
<?php

use yii\bootstrap4\Modal;

        Modal::begin([
            'title' =>'<h4>Eventos Esie</h4>',
            'id'     =>'movi-modal',
            'size'   =>'modal-lg',
            'clientOptions' => ['backdrop' => 'static', 'keyboard' => FALSE]
            ]);
            echo "<div id='movi-modalContent'> </div>";
        Modal::end();
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
		
		customButtons: {
			myCustomButton: {
				text: 'Crear Curso',
				click: function() {
					$.ajax({
					url: '/curso/create-curso',
					/* data: {_csrf:csrfToken, datos:{ start_date: start_date,end_date: end_date}}, */
					type: 'GET',
					success: function(data) {
						// Cargar el contenido recibido en la solicitud AJAX dentro del cuerpo del modal
						$('#movi-modalContent').off();
						$('#movi-modal #movi-modalContent').html(data);
			
						$('#movi-modal').modal('show');
						
						// Configurar el botón de enviar dentro del modal
						$('#movi-modalContent').off('submit').on('submit', function(e) {
						// Evitar que el formulario se envíe normalmente
						e.preventDefault();
							var formData = $('#curso').serialize();

							// Enviar los datos al controlador a través de AJAX
							$.ajax({
								url: '/curso/create-curso',
								type: 'POST',
								data: formData,
								dataType: 'json',
								success: function(response) {
									// Manejar la respuesta
									if (response.success) {
										$('#movi-modal').modal('hide');
										if(response.status == 1){

											calendar.refetchEvents();

											Swal.fire(response.message,'','success');
										}else if(response.status == 2) {
											Swal.fire(response.message,'','success');
										}else {
											Swal.fire(response.message,'','error');
										}
												
									} else {
									Swal.fire('Error', 'Hubo un error al crear el curso ', 'error');
									}
								},
								error: function(xhr, status, error) {
									console.error(error);
									Swal.fire('Error', 'Hubo un error', 'error');
								}
							});
						});

						},
						error: function(xhr, status, error) {
							console.error(error);
						},
					});
				}
			},
			panelControl: {
				text: 'Panel de control',
				click: function() {
					window.location.href = "/site/dashboard";
				}
			},
			miPanel: {
				text: 'Mi panel',
				click: function() {
					window.location.href = "/site/panel";
				}
			}
		},
      headerToolbar: {
        left: 'prev,next today myCustomButton panelControl miPanel',
        center: 'title',
        right: 'multiMonthYear,dayGridMonth'
      },
      locale: initialLocaleCode,
      initialView: 'multiMonthYear',
      
      //initialDate: '2023-01-12',
      editable: true,
      selectable: true,
      dayMaxEvents: true, // allow "more" link when too many events
      // multiMonthMaxColumns: 1, // guarantee single column
      // showNonCurrentDates: true,
      //fixedWeekCount: false,
      // businessHours: true,
      // weekends: false,
      events: '/curso/events',
      select: function(arg) { // Create Event
				var start_date = arg.startStr;
				var end_date = arg.endStr;
				$.ajax({
				url: '/curso/create',
				data: {_csrf:csrfToken, datos:{ start_date: start_date,end_date: end_date}},
				type: 'POST',
				success: function(data) {
					 // Cargar el contenido recibido en la solicitud AJAX dentro del cuerpo del modal
					$('#movi-modalContent').off();
					$('#movi-modal #movi-modalContent').html(data);
        
					$('#movi-modal').modal('show');
					
					// Configurar el botón de enviar dentro del modal
					$('#movi-modalContent').off('submit').on('submit', function(e) {
					// Evitar que el formulario se envíe normalmente
					e.preventDefault();
						var formData = $('#curso').serialize();

						// Enviar los datos al controlador a través de AJAX
						$.ajax({
							url: '/curso/create',
							type: 'POST',
							data: formData,
							dataType: 'json',
							success: function(response) {
								// Manejar la respuesta
								if (response.success) {
									$('#movi-modal').modal('hide');
									if(response.status == 1){

										calendar.refetchEvents();

										Swal.fire(response.message,'','success');
									}else if(response.status == 2) {
										Swal.fire(response.message,'','success');
									}else {
										Swal.fire(response.message,'','error');
									}
											
								} else {
								Swal.fire('Error', 'Hubo un error al crear el curso ', 'error');
								}
							},
							error: function(xhr, status, error) {
								console.error(error);
								Swal.fire('Error', 'Hubo un error', 'error');
							}
						});
					});

				},
				error: function(xhr, status, error) {
					console.error(error);
				},
				});
				calendar.unselect()

	      	},
	      	eventDrop: function (event, delta) { // Move event

	      		// Event details
	      		var eventid = event.event.extendedProps.eventid;
	      		var newStart_date = event.event.startStr;
	      		var newEnd_date = event.event.endStr;
	           	
	           	// AJAX request
	           	$.ajax({
					url: '/curso/move',
					type: 'post',
					data: { _csrf:csrfToken, datos:{ eventid: eventid, start_date: newStart_date, end_date: newEnd_date }},
					dataType: 'json',
					async: false,
					success: function(response){

						console.log(response);
									
					},
					error: function(xhr, status, error) {
						console.error(error);
						Swal.fire('Error', 'Hubo un error', 'error');
					}
				}); 

	        },
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
					
					$('#modalContent').off('#update').on('click', '#update', function(e){
					// Evitar que el formulario se envíe normalmente
					e.preventDefault();
						// Enviar los datos al controlador a través de AJAX

						$.ajax({
							url: '/curso/update',
							type: 'GET',
							data: { _csrf:csrfToken, id: eventid },
							async: false,
							success: function(data) {
								// Cargar el contenido recibido en la solicitud AJAX dentro del cuerpo del modal
								$('#curso-modal').modal('hide');

								$('#movi-modal #movi-modalContent').html(data);
					
								$('#movi-modal').modal('show');

								$('#movi-modalContent').off('submit').on('submit', function(e) {
								// Evitar que el formulario se envíe normalmente
								e.preventDefault();
									var formData = $('#curso').serialize();

									// Enviar los datos al controlador a través de AJAX
									$.ajax({
										url: '/curso/update',
										type: 'POST',
										data: formData,
										dataType: 'json',
										async: false,
										success: function(response) {
											// Manejar la respuesta
											if (response.success) {
												$('#movi-modal').modal('hide');
												if(response.status == 1){

													// Refetch all events
													calendar.refetchEvents();

													Swal.fire(response.message,'','success');
												}else if(response.status == 2) {
													Swal.fire(response.message,'','success');
												}else {
													Swal.fire(response.message,'','error');
												}
														
											} else {
											Swal.fire('Error', 'Hubo un error al crear el curso ', 'error');
											}
										},
										error: function(xhr, status, error) {
											console.error(error);
											Swal.fire('Error', 'Hubo un error', 'error');
										}
									});
								});
							},

							error: function(xhr, status, error) {
								console.error(error);
								alert('Error al cargar el formulario de actualización.');
							}
						});
					});
					$('#modalContent').off('#delete').on('click', '#delete', function(e){
						// Evitar que el formulario se envíe normalmente
						e.preventDefault();
						Swal.fire({
							title: "Está por eliminar el registro "+eventid,
							text: "Esta acción no podrá ser revertida!",
							icon: "warning",
							showCancelButton: true,
							confirmButtonColor: "#3085d6",
							cancelButtonColor: "#d33",
							confirmButtonText: "Borrar registro"
						}).then((result) => {
							if (result.isConfirmed) {
								// AJAX - Delete Event
								$.ajax({
									url: '/curso/delete',
									type: 'POST',
									data: { _csrf:csrfToken, datos:{ id: eventid } },
									dataType: 'json',
									async: false,
									success: function(response){
										$('#curso-modal').modal('hide');
										if (response.success) {
											// Remove event from Calendar
											arg.event.remove();
											// Alert message
											Swal.fire(response.message, '', 'success');
										} else {
											Swal.fire(response.message, '', 'error');
										}										
									},
									error: function(xhr, status, error) {
										console.error(error);
										Swal.fire('Error', 'Hubo un error', 'error');
									}
								}); 
							}
						});
					});
				},
				});
	      		
	      	}
    	});

    calendar.render();
  });
</script>