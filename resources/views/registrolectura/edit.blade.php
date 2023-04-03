@extends('vistas.master')
@section('contenido_central')

<h1>Editar un registro de lectura</h1>

{!! Form::open([ 'method' => 'PATCH' , 'url' =>'/registrolectura/'.$registrolectura->id]) !!}

        {!! Form::label ('id_users','Usuario') !!}
		{!! Form::select ('id_users',$users->pluck('name','id')->all(), $registrolectura->id_users,['placeholder'=>'Seleccionar...', 'required'=>'required']) !!}
		@error('id_users')
		<small style="color: white">{{ $message }}</small>
		@enderror
		<br></br>

        {!! Form::label ('id_ayudavisual','Ayuda visual') !!}
		{!! Form::select ('id_ayudavisual',$ayudasvisuales->pluck('nombre','id')->all(), $registrolectura->id_ayudavisual,['placeholder'=>'Seleccionar...', 'required'=>'required']) !!}
		@error('id_ayudavisual')
		<small style="color: white">{{ $message }}</small>
		@enderror
		<br></br>

        {!! Form::label ('status','Estado') !!}
		{!! Form::select ('status',array('1'=>'Activo','0'=>'Baja') , $registrolectura->status,['placeholder'=>'Seleccionar ...', 'required'=>'required']) !!}
		@error('status')
		<small style="color: white">{{ $message }}</small>
		@enderror
		<br></br>

		{!! Form::submit('Guardar registro') !!}
		{!! Form::close() !!}

@endsection()