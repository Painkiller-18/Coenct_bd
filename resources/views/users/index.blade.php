@extends('vistas.master')
@section('contenido_central')
<br>
<div class="container-fluid">
<h1 style="color: black; text-align:center">Lista de usuarios</h1>
<a href="register/create"><span class="fa fa-user-plus"></span> Crear Usuario</a>
<table id="example" class="table table-hover" style="width:100%">
<thead>
	<tr>
		<th>ID</th>
		<th>Nombre</th>
		<th>Apellido Paterno</th>
		<th>Apellido Materno</th>
		<th>Departamento</th>
		<th>Nivel de acceso</th>
		<th>Numero de empleado</th>
		<th>Correo Electrónico</th>
		<th>Puesto</th>
		<th>Área de trabajo</th>
		<th>Acciones</th>
	</tr>
</thead>
<tbody>
	@foreach($users as $users)
	<tr>
		<td>{!! $users->id !!}</td>
		<td>{!! $users->name !!}</td>
		<td>{!! $users->app !!}</td>
		<td>{!! $users->apm !!}</td>
		<td>{!! $users->nempleado !!}</td>
		<td>{!! $users->email !!}</td>
		<td>{!! $users->departamento->nombre !!}</td>
		<td>{!! $users->puesto->nombre !!}</td>
		<td>{!! $users->nivelacceso->nombre !!}</td>	
		<td>{!! $users->areatrabajo->nombre !!}</td>
		<td>
			<div class="container">
					<a class="btn-secondary" href="{!! 'register/'.$users->id !!}" style="text-decoration: none;    padding: 20px 50px; font-size: 1rem;	padding: 0.375rem 0.75rem; position: block;">Detalles</a>

					<a  class="btn-primary" href="{!! 'register/'.$users->id.'/edit' !!}" style="    text-decoration: none; padding: 20px 50px; font-size: 1rem;	padding: 0.375rem 0.75rem; position: block;">Editar</a>
				
						{!! Form::open(['method' => 'DELETE' , 'url' => '/register/'.$users->id]) !!}
						<button type="submit" class="btn-danger deleteBtn" style="text-decoration: none; font-size: 1rem; color:white; padding: 0.375rem 0.75rem; margin-top:10px;">Eliminar</button>
						{!! Form::close() !!}
					</div>
			
		</td>
	</tr>
	@endforeach
</tbody>
</table>
</div>
<br />
<br />
@endsection()
@section('scripts')
<script src="{!! asset('estilo/js/sweetalert2.all.min.js') !!}"></script>
<script>
	$('.deleteBtn').click(function(e) {
		e.preventDefault();
		Swal.fire({
			title: '¿Seguro que deseas eliminar este usuario?',
			text: "No podrás revertir este cambio.",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonText: 'Cancelar',
			confirmButtonText: 'Eliminar',
			reverseButtons: true,
			focusCancel: true
		}).then((result) => {
			if (result.isConfirmed) {
				console.log($(this).parents('form').submit())
			}
		})
	});
</script>
@endsection()