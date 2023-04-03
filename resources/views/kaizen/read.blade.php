@extends('vistas.master')
@section('contenido_central')

<a href="{!! asset('kaizen') !!}" style="margin-left: 2em; color:black;"><i class="fas fa-arrow-left"></i> Regresar</a>
<div class="row" style="width: 75%; margin-left: 12.5%; margin-right: 12.5%;">
    <h1>Detalle de Kaizen</h1>
     <div class="col-md-3">
        <label for="nombre">Nombre:</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text fa fa-file"></span>
            </div>
            <input name="nombre" class="form-control" value="{!! $kaizen->nombre !!}" aria-label="Username" aria-describedby="basic-addon1" disabled readonly>
        </div>
    </div>
     <div class="col-md-3">
        <label for="nombre">Documento:</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text fa fa-file"></span>
            </div>
            <input name="nombre" class="form-control" value="{!! $kaizen->documento !!}" aria-label="Username" aria-describedby="basic-addon1" disabled readonly>
        </div>
    </div>
        <div class="col-md-3">
        <label for="nombre">Fecha de creación:</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text fa fa-file"></span>
            </div>
            <input name="nombre" class="form-control" value="{!!  $kaizen->fecha_creacion !!}" aria-label="Username" aria-describedby="basic-addon1" disabled readonly>
        </div>
    </div>
    <div class="col-md-3">
        <label for="nombre">Fecha de actualización:</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text fa fa-file"></span>
            </div>
            <input name="nombre" class="form-control" value="{!! $kaizen->fecha_actualizacion !!}" aria-label="Username" aria-describedby="basic-addon1" disabled readonly>
        </div>
    </div>
</div>
<br>
<div style="width: 100%; display: flex; align-items: center; justify-content: center;">
    <iframe src="{{ asset('/storage/public/kaizen/'.$kaizen->documento.'') }}" frameborder="0" width="75%" height="800px"></iframe>
</div>

<br />
<br />

@endsection()