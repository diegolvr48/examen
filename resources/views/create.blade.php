@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Nuevo Empleado</div>

				<div class="panel-body">
					<div class="error"></div>
					<form id="form_employee">
						<div class="form-group">
							<label for="nombre">Nombre: </label>
							<input type="text" class="form-control" id="nombre" placeholder="Nombre">
						</div>
						<div class="form-group">
							<label for="apaterno">Apellido Paterno: </label>
							<input type="text" class="form-control" id="apaterno" placeholder="Apellido Paterno">
						</div>
						<div class="form-group">
							<label for="amaterno">Apellido Materno: </label>
							<input type="text" class="form-control" id="amaterno" placeholder="Apellido Materno">
						</div>
						<div class="form-group">
							<label for="amaterno">Fecha de Nacimiento: </label>
							<input type="text" class="form-control" id="fecha_nacimiento" placeholder="dd/mm/YYYY">
						</div>
						<div class="form-group">
							<label for="amaterno">Ingresos Anuales: </label>
							<input type="text" class="form-control" id="ingresos" placeholder="Ingresos">
						</div>
						<button type="submit" class="btn btn-success">Guardar</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
