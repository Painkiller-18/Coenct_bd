@extends('vistas.master')
@section('contenido_central')
<br>
<div class="container-fluid">
	<h1 style="color: black; text-align:center;">Análisis de desgaste</h1>
	<a href="analisisdesgaste/create" <?php if (auth()->user()->id_nivelacceso == '3') { ?> style="display: none;" <?php } ?>>
		<span class="fa fa-plus"></span> Crear un nuevo análisis
	</a>
	<a href="analisisdesgaste/upload" <?php if (auth()->user()->id_nivelacceso == '3') { ?> style="display: none;" <?php } ?>>
		<span class="fa fa-upload" style="margin-left: 10px;"></span> Subir un análisis existente
	</a>
	<table id="example" class="table table-hover" style="width:100%">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nombre</th>
				<th>Documento</th>
				<th>Fecha de creación</th>
				<th>Fecha de actualización</th>
				<th <?php if (auth()->user()->id_nivelacceso == '3') { ?> style="display: none;" <?php } ?>>Acciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach($analisisdesgaste as $analisisdesgaste)
			<tr>
				<td>{!! $analisisdesgaste->id !!}</td>
				<td>{!! $analisisdesgaste->nombre !!}</td>
				<!-- <td>{!! $analisisdesgaste->documento !!}</td> -->
				<td><a type="button" data-toggle="modal" data-target="#exampleModal_{{ $analisisdesgaste->id }}" href="{{ asset('/desgaste/show/') }}/{{ $analisisdesgaste->id }}"><img src="/icon/pdf.svg" alt="pdf" width="80px" height="80px"></a>
				</td>

				<td>{!! $analisisdesgaste->fecha_creacion !!}</td>
				<td>{!! $analisisdesgaste->fecha_actualizacion !!}</td>

				<td <?php if (auth()->user()->id_nivelacceso == '3') { ?> style="display: none;" <?php } ?>>
					<div class="container">
						<a class="btn-secondary" href="{!! 'analisisdesgaste/'.$analisisdesgaste->id !!}" style="text-decoration: none;    padding: 20px 50px; font-size: 1rem;	padding: 0.375rem 0.75rem; position: block;">Detalles</a>

						<a class="btn-primary" href="{!! 'analisisdesgaste/'.$analisisdesgaste->id.'/edit' !!}" style="    text-decoration: none; padding: 20px 50px; font-size: 1rem;	padding: 0.375rem 0.75rem; position: block;">Editar</a>

						{!! Form::open(['method' => 'DELETE' , 'url' => '/analisisdesgaste/'.$analisisdesgaste->id]) !!}
						<button type="submit" class="btn-danger deleteBtn" <?php if (auth()->user()->id_nivelacceso == '2') { ?> style="display: none;" <?php } ?> style="text-decoration: none; font-size: 1rem; color:white; padding: 0.375rem 0.75rem; margin-top:10px;">Eliminar</button>
						{!! Form::close() !!}
					</div>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	@foreach($analisisdesgastemodal as $analisisdesgaste)
	<div class="modal fade" id="exampleModal_{{ $analisisdesgaste->id }}" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Detalle de la Actividad</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<iframe src="{{ asset('/storage/public/analisisdesgaste/'.$analisisdesgaste->documento.'') }}" frameborder="0" width="100%" height="800px"></iframe>
				</div>
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
			title: '¿Seguro que deseas eliminar este análisis de desgaste?',
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