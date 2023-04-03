@extends('vistas.master')
@section('contenido_central')

<a href="{!! asset('kaizen') !!}" style="margin-left: 2em; color:black;"><i class="fas fa-arrow-left"></i> Regresar</a>
<div style="width: 75%; margin-left: 12.5%; margin-right: 12.5%;">
	<h1>Subir Kaizen</h1>
	{!! Form::open([ 'method' => 'PUT' , 'url' =>'/kaizen/upload', 'enctype'=>'multipart/form-data']) !!}
	<div class="row">
		<div class="col-md-4">
			<label for="nombre">Nombre de kaizen:</label>
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text fa fa-file"></span>
				</div>
				<input name="nombre" class="form-control" value="{!! old('nombre') !!}" placeholder="Nombre de kaizen" aria-label="nombre" aria-describedby="basic-addon1">
			</div>
			<label style="color: red;">@error('nombre') {{$message}} @enderror</label>
		</div>
		<div class="col-md-6">
			<label for="documento">Documento:</label>
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text fa fa-file-import"></span>
				</div>
				<input id="documento" class="form-control" type="file" accept=".pdf" name="documento" value="{{old('documento')}}" onchange="previewDocument();">
			</div>
			<label style="color: red;">@error('documento') {{$message}} @enderror</label>
		</div>
	</div>
    <div class="row">
        <div class="col-md-3">
			<label for="fecha_creacion">Fecha de creación:</label>
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text fa fa-calendar"></span>
				</div>
				<input id="fecha_creacion" class="form-control" type="date" name="fecha_creacion" value="{{old('fecha_creacion')}}">
			</div>
			<label style="color: red;">@error('fecha_creacion') {{$message}} @enderror</label>
		</div>
        <div class="col-md-3">
			<label for="fecha_actualizacion">Fecha de actualizacíon:</label>
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text fa fa-calendar-check"></span>
				</div>
				<input id="fecha_actualizacion" type="date" class="form-control" readonly placeholder="Fecha de actualización" aria-label="Username" aria-describedby="basic-addon1">
			</div>
		</div>
        <div class="col-md-2" style="display: flex;">
            {!! Form::submit('Guardar', ['class'=>'btn btn-success', 'style'=>'margin: auto; margin-bottom: 40px;']) !!}
        </div>
    </div>
	{!! Form::close() !!}
	<div style="width: 100%; display: flex; align-items: center; justify-content: center;">
		<iframe id="preview" frameborder="0" width="75%" height="800px"></iframe>
	</div>
	<br />
</div>
@endsection()
@section('scripts')
<script>
    $(document).ready(function () {
		setDate();
		setInterval(setDate, 1000);
	});
	function previewDocument(){
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