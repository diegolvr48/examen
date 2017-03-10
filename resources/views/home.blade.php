@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Listado de Empleados</div>

				<div class="panel-body">
					<input type="search" placeholder="Buscar por ID o por Nombre" class="form-control">
					<table class="table table-striped" id="empleados">
						<thead>
							<tr>
								<th>Id</th>
								<th>Nombre</th>
								<th>Ap Paterno</th>
								<th>Ap Materno</th>
								<th>Fecha Nacimiento</th>
								<th>Ingreso Anual</th>
							</tr>
						</thead>
						<tbody></tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
