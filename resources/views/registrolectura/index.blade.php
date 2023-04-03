@extends('vistas.master')
@section('contenido_central')
<br>
<div class="container-fluid">
<h1 style="text-align:center">Registro de lectura</h1>
<table id="example" class="table table-hover" style="width:100%">
	<thead>
			<tr>
				<th>ID</th>
				<th>Usuario</th>
				<th>Ayuda visual</th>
				<th>Fecha de Enterado</th>
				<th <?php if (auth()->user()->id_nivelacceso == '3'){ ?>  style="display: none;" <?php } ?>>Acciones</th>
			</tr>
	</thead>
		<tbody>
			@foreach($registrolectura as $registrolectura)
				<tr>
					<td>{!! $registrolectura->id !!}</td>
					<td>{!! $registrolectura->users->name !!}</td>
					<td>{!! $registrolectura->ayudasvisuales->nombre !!}</td>
					<td>{!! $registrolectura->fecha_enterado !!}</td>
					<td <?php if (auth()->user()->id_nivelacceso == '3'){ ?>  style="display: none;" <?php } ?>>
					<div class="container">
					<a class="btn-secondary" href="{!! 'registrolectura/'.$registrolectura->id !!}" style="text-decoration: none;    padding: 20px 50px; font-size: 1rem;	padding: 0.375rem 0.75rem; position: block;">Detalles</a>
				
						{!! Form::open(['method' => 'DELETE' , 'url' => '/registrolectura/'.$registrolectura->id]) !!}
						<button type="submit" class="btn-danger deleteBtn" <?php if (auth()->user()->id_nivelacceso == '2') { ?> style="display: none;" <?php } ?> style="text-decoration: none; font-size: 1rem; color:white; padding: 0.375rem 0.75rem; margin-top:10px;">Eliminar</button>
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
			title: '¿Seguro que deseas eliminar este Kaizen?',
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