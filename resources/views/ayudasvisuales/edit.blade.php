@extends('vistas.master')
@section('contenido_central')

<a href="{!! asset('ayudasvisuales') !!}" style="margin-left: 2em; color:black;"><i class="fas fa-arrow-left"></i> Regresar</a>
<div style="width: 75%; margin-left: 12.5%; margin-right: 12.5%;">
	<h1>Editar Ayudas visuales</h1>

	{!! Form::open([ 'method' => 'PATCH' , 'url' =>'/ayudasvisuales/'.$ayudasvisuales->id, 'enctype'=>'multipart/form-data']) !!}
	<div class="row">
		<div class="col-md-4">
			<label for="nombre">Nombre de la ayuda visual:</label>
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text fa fa-file"></span>
				</div>
				<input name="nombre" class="form-control" value="{!! old('nombre', $ayudasvisuales->nombre) !!}" placeholder="Nombre de la ayuda visual" aria-label="Username" aria-describedby="basic-addon1">
			</div>
			<label style="color: red;">@error('nombre') {{$message}} @enderror</label>
		</div>
		<div class="col-md-4">
			<label for="pieza">Nombre de la pieza:</label>
			<div class="input-group mb-3">
			<div class="input-group-prepend">
					<span class="input-group-text fa fa-puzzle-piece"></span>
				</div>
				<input name="pieza" class="form-control" value="{!! old('pieza', $ayudasvisuales->pieza) !!}" placeholder="Nombre de la pieza" aria-label="Username" aria-describedby="basic-addon1">
			</div>
			<label style="color: red;">@error('pieza') {{$message}} @enderror</label>
		</div>
		<div class="col-md-4">
			<label for="documento">Documento:</label>
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text fa fa-file-import"></span>
				</div>
				<input name="documento" id="documento" type="file" accept=".pdf" class="form-control" value="{!! old('documento', $ayudasvisuales->documento) !!}" placeholder="Documento" aria-label="Username" aria-describedby="basic-addon1" onchange="previewDocument();">
			</div>
			<label style="color: red;">@error('documento') {{$message}} @enderror</label>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
			<label for="date">Fecha de Creación:</label>
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text fa fa-calendar"></span>
				</div>
				<input name="fecha_creacion" type="date" class="form-control" value="{!! old('fecha_creacion', $ayudasvisuales->fecha_creacion) !!}" placeholder="Fecha de creación" aria-label="Username" aria-describedby="basic-addon1">
			</div>
			<label style="color: red;">@error('fecha_creacion') {{$message}} @enderror</label>
		</div>
		<div class="col-md-3">
			<label for="fecha_actualizacion">Fecha de actualizacíon:</label>
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text fa fa-calendar-check"></span>
				</div>
				<input id="fecha_actualizacion" type="date" name="fecha_actualizacion" class="form-control" readonly placeholder="Fecha de actualización" aria-label="Username" aria-describedby="basic-addon1">
			</div>
			<label style="color: red;">@error('fecha_actualizacion') Debes seleccionar un departamento. @enderror</label>
		</div>
		<div class="col-md-2">
			{!! Form::submit('Guardar', ['class'=>'btn btn-success', 'style'=>'margin: auto; margin-top: 30px;']) !!}
		</div>
	</div>
	{!! Form::close() !!}
</div>
</div>
<br>
<div style="width: 100%; display: flex; align-items: center; justify-content: center;">
	<iframe id="preview" src="{{ asset('/storage/public/ayudasvisuales/	'.$ayudasvisuales->documento.'') }}" frameborder="0" width="75%" height="800px"></iframe>
</div>
<br />
<br />
@endsection()
@section('scripts')
<script>
	$(document).ready(function () {
		setDate();
		setInterval(setDate, 1000);
	});
	function previewDocument() {
		var reader = new FileReader();
		reader.readAsDataURL(document.getElementById('documento').files[0]);
		reader.onload = function(e) {
			document.getElementById('preview').src = e.target.result;
		};
	}
	function setDate() {
        var currentDate = new Date();
        var day = format(currentDate.getDate());
        var month = format(currentDate.getMonth() + 1);
        var year = currentDate.getFullYear();
        var date = year + '-' + month + '-' + day;
        $('#fecha_actualizacion').val(date);
    }

    function format(number) {
        if (number < 10) {
            return '0' + number;
        } else {
            return number;
        }
    }
</script>
@endsection()