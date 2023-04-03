@extends('vistas.master')
@section('contenido_central')

<a href="{!! asset('register') !!}" style="margin-left: 2em; color:black;"><i class="fas fa-arrow-left"></i> Regresar</a>
<div style="width: 75%; margin-left: 12.5%; margin-right: 12.5%;">
	<h1>Editar Usuarios</h1>
	{!! Form::open([ 'method' => 'PATCH' , 'url' =>'/register/'.$users->id]) !!}
	<div class="row">
		<div class="col-md-4">
			<label for="name">Nombre:</label>
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text fa fa-user"></span>
				</div>
				<input name="name" class="form-control" value="{!! old('name', $users->name) !!}" placeholder="Nombre" aria-label="Username" aria-describedby="basic-addon1">
			</div>
			<label style="color: red;">@error('name') {{$message}} @enderror</label>
		</div>
		<div class="col-md-4">
			<label for="app">Apellido Paterno:</label>
			<div class="input-group mb-3">
				<input name="app" class="form-control" value="{!! old('app', $users->app) !!}" placeholder="Apellido paterno" aria-label="Username" aria-describedby="basic-addon1">
			</div>
			<label style="color: red;">@error('app') {{$message}} @enderror</label>
		</div>
		<div class="col-md-4">
			<label for="apm">Apellido Materno:</label>
			<div class="input-group mb-3">
				<input name="apm" class="form-control" value="{!! old('apm', $users->apm) !!}" placeholder="Apellido materno" aria-label="Username" aria-describedby="basic-addon1">
			</div>
			<label style="color: red;">@error('apm') {{$message}} @enderror</label>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<label for="email">Correo electrónico:</label>
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text fas fa-at"></span>
				</div>
				<input name="email" class="form-control" value="{!! old('email', $users->email) !!}" placeholder="Correo electrónico" aria-label="Username" aria-describedby="basic-addon1">
			</div>
			<label style="color: red;">@error('email') {{$message}} @enderror</label>
		</div>
		<div class="col-md-6">
			<label for="nempleado">Número de empleado:</label>
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text fas fa-id-card"></span>
				</div>
				<input name="nempleado" class="form-control" value="{!! old('nempleado', $users->nempleado) !!}" placeholder="Número de empleado" aria-label="Username" aria-describedby="basic-addon1">
			</div>
			<label style="color: red;">@error('nempleado') {{$message}} @enderror</label>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
			<label for="id_departamento">Departamento:</label>
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text fa fa-warehouse"></span>
				</div>
				{!! Form::select ('id_departamento',$departamento->pluck('nombre','id')->all(), old('id_departamento', $users->id_departamento),['placeholder'=>'Selecciona un departamento', 'class'=>'form-control']) !!}
			</div>
			<label style="color: red;">@error('id_departamento') Debes seleccionar un departamento. @enderror</label>
		</div>
		<div class="col-md-3">
			<label for="id_puesto">Puesto:</label>
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text fa fa-id-badge"></span>
				</div>
				{!! Form::select ('id_puesto',$puesto->pluck('nombre','id')->all(), old('id_puesto', $users->id_puesto),['placeholder'=>'Selecciona un puesto', 'class'=>'form-control']) !!}
			</div>
			<label style="color: red;">@error('id_puesto') Debes seleccionar un puesto. @enderror</label>
		</div>
		<div class="col-md-3">
			<label for="id_nivelacceso">Nivel de acceso:</label>
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text fa fa-layer-group"></span>
				</div>
				{!! Form::select ('id_nivelacceso',$nivelacceso->pluck('nombre','id')->all(),old('id_nivelacceso', $users->id_nivelacceso) ,['placeholder'=>'Selecciona un nivel', 'class'=>'form-control']) !!}
			</div>
			<label style="color: red;">@error('id_nivelacceso') Debes seleccionar un nivel de acceso. @enderror</label>
		</div>
		<div class="col-md-3">
			<label for="id_areatrabajo">Área de trabajo:</label>
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text fa fa-briefcase"></span>
				</div>
				{!! Form::select ('id_areatrabajo',$areatrabajo->pluck('nombre','id')->all(), old('id_areatrabajo', $users->id_areatrabajo),['placeholder'=>'Selecciona un área', 'class'=>'form-control']) !!}
			</div>
			<label style="color: red;">@error('id_areatrabajo') Debes seleccionar un área de trabajo @enderror</label>
		</div>
	</div>
	{!! Form::submit('Guardar', ['class'=>'btn btn-success', 'style'=>'margin: auto; position: absolute; right: 15%;']) !!}
	{!! Form::close() !!}
	<br />
	<h4>Acutalizar contraseña</h4>
	{!! Form::open([ 'method' => 'PUT' , 'url' =>'/Uppassword/'.$users->id]) !!}
	<div class="row">
		<div class="col-md-4">
			<label for="password_edit">Nueva contraseña:</label>
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text fa fa-lock"></span>
				</div>
				<input id="password_edit" type="password" value="{{ old('password_edit') }}" name="password_edit" style="padding-right: 2.5rem;" value="" autocomplete="new-password" class="form-control" placeholder="Nueva contraseña" aria-label="password_edit" aria-describedby="basic-addon1">
				<div class="input-group-append">
					<span id="edit" class="input-group-text fa fa-eye-slash"></span>
				</div>
			</div>
			<label style="color: red;">@error('password_edit') {{$message}} @enderror</label>
		</div>
		<div class="col-md-4">
			<label for="password_confirmation">Confirma contraseña:</label>
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text fa fa-check"></span>
				</div>
				<input id="password_confirmation" type="password" name="password_confirmation" class="form-control" placeholder="Confirma contraseña" aria-label="password" aria-describedby="basic-addon1">
				<div class="input-group-append">
					<span id="confirmation" class="input-group-text fa fa-eye-slash"></span>
				</div>
			</div>
			<label style="color: red;">@error('password_confirmation') {{$message}} @enderror</label>
		</div>
	</div>
	{!! Form::submit('Actualizar', ['class'=>'btn btn-success', 'style'=>'margin: auto; position: absolute; right: 39%;']) !!}
	{!! Form::close() !!}
</div>
<br />



<style>
	.fa-eye-slash {
		cursor: pointer;
	}
	.fa-eye{
		cursor: pointer;
	}
</style>
@endsection()
@section('scripts')
<script>
	$(document).ready(function () {
		$('#confirmation').click(function () {
			togglePassword('#confirmation', '#password_confirmation');
		});
		$('#edit').click(function () { 
			togglePassword('#edit', '#password_edit');
			
		});
		function togglePassword(spanId, inputId){
			if($(spanId).hasClass('fa-eye-slash')){
				$(spanId).removeClass('fa-eye-slash');
				$(spanId).addClass('fa-eye');
				$(inputId).prop('type', 'text');
			}else{
				$(spanId).removeClass('fa-eye');
				$(spanId).addClass('fa-eye-slash');
				$(inputId).prop('type', 'password');
			}
		}
	});
</script>
@endsection()