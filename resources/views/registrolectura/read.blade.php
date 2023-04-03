@extends('vistas.master')
@section('contenido_central')
<a href="{!! asset('registrolectura') !!}" style="margin-left: 2em; color:black;"><i class="fas fa-arrow-left"></i> Regresar</a>
<div class="row" style="width: 75%; margin-left: 12.5%; margin-right: 12.5%;">
    <h1>Detalle del registro de lectura</h1>
    <div class="col-md-4">
        <label for="nombre">Nombre:</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text fa fa-file"></span>
            </div>
            <input name="nombre" class="form-control" value="{!! $registrolectura->users->name !!}" aria-label="Username" aria-describedby="basic-addon1" disabled readonly>
        </div>
    </div>
    <div class="col-md-4">
        <label for="nombre">Nombre de la ayuda visual:</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text fa fa-file"></span>
            </div>
            <input name="nombre" class="form-control" value="{!! $registrolectura->ayudasvisuales->nombre !!} " aria-label="Username" aria-describedby="basic-addon1" disabled readonly>
        </div>
    </div>
    <div class="col-md-4">
        <label for="nombre">Fecha de enterado:</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text fa fa-file"></span>
            </div>
            <input name="nombre" class="form-control" value="{!! $registrolectura->fecha_enterado !!}" aria-label="Username" aria-describedby="basic-addon1" disabled readonly>
        </div>
    </div>
</div>
<br/>
<div style="width: 100%; display: flex; align-items: center; justify-content: center;">
<iframe src="{{ asset('/storage/public/ayudasvisuales/'.$registrolectura->ayudasvisuales->documento.'') }}" frameborder="0" width="75%" height="800px" ></iframe>
</div>

<br/>
<br/>

@endsection()