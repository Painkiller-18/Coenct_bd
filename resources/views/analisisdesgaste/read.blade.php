@extends('vistas.master')
@section('contenido_central')
<a href="{!! asset('analisisdesgaste') !!}" style="margin-left: 2em; color:black;"><i class="fas fa-arrow-left"></i> Regresar</a>
<div style="width: 75%; margin-left: 12.5%; margin-right: 12.5%;">
    <h1>Detalle de Análisis Desgaste</h1>
    <h5>Nombre: {!! $analisisdesgaste->nombre !!}</h5>
        <div class="col-md-4">
        <label for="nombre">Nombre de la ayuda visual:</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text fa fa-file"></span>
            </div>
            <input name="nombre" class="form-control" value="{!! $ayudasvisuales->nombre !!}" aria-label="Username" aria-describedby="basic-addon1" disabled readonly>
        </div>
    </div>
    <h5>Documento: {!! $analisisdesgaste->documento !!}</h5>
        <div class="col-md-4">
        <label for="nombre">Nombre de la ayuda visual:</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text fa fa-file"></span>
            </div>
            <input name="nombre" class="form-control" value="{!! $ayudasvisuales->nombre !!}" aria-label="Username" aria-describedby="basic-addon1" disabled readonly>
        </div>
    </div>
    <h5>Fecha de creación: {!! $analisisdesgaste->fecha_creacion !!}</h5>
        <div class="col-md-4">
        <label for="nombre">Nombre de la ayuda visual:</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text fa fa-file"></span>
            </div>
            <input name="nombre" class="form-control" value="{!! $ayudasvisuales->nombre !!}" aria-label="Username" aria-describedby="basic-addon1" disabled readonly>
        </div>
    </div>
    <h5>Fecha de actualización: {!! $analisisdesgaste->fecha_actualizacion !!}</h5>
        <div class="col-md-4">
        <label for="nombre">Nombre de la ayuda visual:</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text fa fa-file"></span>
            </div>
            <input name="nombre" class="form-control" value="{!! $ayudasvisuales->nombre !!}" aria-label="Username" aria-describedby="basic-addon1" disabled readonly>
        </div>
    </div>
</div>
<br />
<div style="width: 100%; display: flex; align-items: center; justify-content: center;">
    <iframe src="{{ asset('/storage/public/analisisdesgaste/'.$analisisdesgaste->documento.'') }}" frameborder="0" width="75%" height="800px"></iframe>
</div>

<br />
<br />

@endsection()