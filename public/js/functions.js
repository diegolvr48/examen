$(function(){
	$('#fecha_nacimiento').datepicker();
	$('#ingresos').autoNumeric('init');
	if ($('#form_employee').length) {
		$('#form_employee').submit(function(event) {
			event.preventDefault();
			var btn = $('button[type="submit"]').button('loading');
			$.ajax({
				url: '/empleados',
				type: 'POST',
				dataType: 'JSON',
				data: {
					nombre: $('#nombre').val(),
					apaterno: $('#apaterno').val(),
					amaterno: $('#amaterno').val(),
					fecha_nacimiento: $('#fecha_nacimiento').val(),
					ingresos: $('#ingresos').val(),
				},
			})
			.done(function(response) {
				$('.error').html('<div class="alert alert-success" role="alert">'+response.messages+'</ul></div>');
			})
			.fail(function(response) {
				var messages = '<ul>';
				$.each(response.responseJSON.messages, function(index, val) {
					messages += '<li>'+val+'</li>';

				});
				$('.error').html('<div class="alert alert-danger" role="alert">'+messages+'</ul></div>');
				
			})
			.always(function() {
				btn.button('reset');
			});
		});
	}

	if ($('#empleados').length) {
		listEmployees();
		var timerSearch;
		$('input[type="search"]').keyup(function(event) {
			if (timerSearch)
				clearTimeout(timerSearch);
			timerSearch = setTimeout(function(){
				listEmployees()
			},200);
		});
	}

	function listEmployees() {
		$.ajax({
			url: '/empleado/search',
			type: 'GET',
			dataType: 'JSON',
			data: {
				find: $('input[type="search"]').val()
			},
		})
		.done(function(response) {
			$('#empleados tbody').html('');
			$.each(response.data, function(index, val) {
				 $('#empleados tbody').append('<tr><td>'+val.id+'</td><td>'+val.nombre+'</td><td>'+val.apaterno+'</td><td>'+val.amaterno+'</td><td>'+moment(val.salary.fecha_nacimiento).format('DD/MM/YYYY')+'</td><td>'+val.salary.ingreso+'</td></tr>');
			});
		})
		.fail(function(response) {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
	}
});