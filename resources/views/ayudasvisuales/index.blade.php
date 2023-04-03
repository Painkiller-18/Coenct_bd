@extends('vistas.master')
@section('contenido_central')
<br>
<div class="container-fluid">
	<h1 style="color: black; text-align:center">Ayudas visuales</h1>
	<a href="ayudasvisuales/create" <?php if (auth()->user()->id_nivelacceso == '3') { ?> style="display: none;" <?php } ?>><span class="fa fa-upload"></span> Subir ayuda visual</a>
	<table id="example" class="table table-hover" style="color: black; width:100%">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nombre</th>
				<th>Pieza</th>
				<th>Documento</th>
				<th>Fecha de creación</th>
				<th>Fecha de actualización</th>
				<th <?php if (auth()->user()->id_nivelacceso == '3') { ?> style="display: none;" <?php } ?>>Acciones</th>
			</tr>
		</thead>
		@foreach($ayudasvisuales as $ayudasvisuales)
		<tr>
			<td>{!! $ayudasvisuales->id !!}</td>
			<td>{!! $ayudasvisuales->nombre !!}</td>
			<td>{!! $ayudasvisuales->pieza !!}</td>
			<!--<td>{!! $ayudasvisuales->documento !!}</td>-->
			<td>
				<a type="button" data-toggle="modal" data-target="#exampleModal_{{$ayudasvisuales->id}}" href="{{ asset('/ayudas/show/') }}/{{ $ayudasvisuales->id }}"><img src="/icon/pdf.svg" alt="pdf" width="80px" height="80px"></a>
			</td>

			<td>{!! $ayudasvisuales->fecha_creacion !!}</td>
			<td>{!! $ayudasvisuales->fecha_actualizacion !!}</td>
			<td <?php if (auth()->user()->id_nivelacceso == '3') { ?> style="display: none;" <?php } ?>>
				<div class="container">
					<a class="btn-secondary" href="{!! 'ayudasvisuales/'.$ayudasvisuales->id !!}" style="text-decoration: none;    padding: 20px 50px; font-size: 1rem;	padding: 0.375rem 0.75rem; position: block;">Detalles</a>

					<a class="btn-primary" href="{!! 'ayudasvisuales/'.$ayudasvisuales->id.'/edit' !!}" style="text-decoration: none; padding: 20px 50px; font-size: 1rem;	padding: 0.375rem 0.75rem; position: block;">Editar</a>

					{!! Form::open(['method' => 'DELETE' , 'url' => '/ayudasvisuales/'.$ayudasvisuales->id]) !!}
					<button type="submit" class="btn-danger deleteBtn" <?php if (auth()->user()->id_nivelacceso == '2') { ?> style="display: none;" <?php } ?> style="text-decoration: none; font-size: 1rem; color:white; padding: 0.375rem 0.75rem; margin-top:10px;">Eliminar</button>
					{!! Form::close() !!}
				</div>
			</td>
		</tr>
		@endforeach
		</tbody>
	</table>
	@foreach($ayudasvisualesmodal as $ayudasvisuales)
	<div class="modal fade" id="exampleModal_{{$ayudasvisuales->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="exampleModalLabel">{{$ayudasvisuales->nombre}}</h1>
					<button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<iframe src="{{ asset('/storage/public/ayudasvisuales/'.$ayudasvisuales->documento.'') }}" frameborder="0" width="100%" height="800px"></iframe>
				</div>
			</div>
		</div>
	</div>
	@endforeach
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
			title: '¿Seguro que deseas eliminar esta ayuda visual?',
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