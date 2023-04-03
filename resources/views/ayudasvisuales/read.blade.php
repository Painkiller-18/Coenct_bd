@extends('vistas.master')
@section('contenido_central')
<a href="{!! asset('ayudasvisuales') !!}" style="margin-left: 2em; color:black;"><i class="fas fa-arrow-left"></i> Regresar</a>
<h1 style="margin-left: 12.5%; margin-right: 12.5%;">Detalle de Ayuda Visual</h1>
<br />
<div class="row" style="width: 75%; margin-left: 12.5%; margin-right: 12.5%;">
    <div class="col-md-4">
        <label for="nombre">Nombre de la ayuda visual:</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text fa fa-file"></span>
            </div>
            <input name="nombre" class="form-control" value="{!! $ayudasvisuales->nombre !!}" aria-label="Username" aria-describedby="basic-addon1" disabled readonly>
        </div>
    </div>
    <div class="col-md-4">
        <label for="pieza">Nombre de la pieza:</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text fa fa-puzzle-piece"></span>
            </div>
            <input name="pieza" class="form-control" value="{!! $ayudasvisuales->pieza !!}" aria-label="Username" aria-describedby="basic-addon1" disabled readonly>
        </div>
    </div>
    <div class="col-md-4">
        <label for="documento">Documento:</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text fa fa-file-import"></span>
            </div>
            <input class="form-control" value="{!! $ayudasvisuales->documento !!}" placeholder="Documento" aria-label="Username" aria-describedby="basic-addon1" disabled readonly>
        </div>

    </div>
</div>
</div>
<div class="row" style="width: 75%; margin-left: 12.5%; margin-right: 12.5%;">
    <div class="col-md-3">
        <label for="date">Fecha de Creación:</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text fa fa-calendar"></span>
            </div>
            <input class="form-control" value=" {!!$ayudasvisuales->fecha_creacion !!}" aria-label="Username" aria-describedby="basic-addon1" disabled readonly>
        </div>
    </div>
    <div class="col-md-3">
        <label for="fecha_actualizacion">Fecha de actualizacíon:</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text fa fa-calendar-check"></span>
            </div>
            <input class="form-control" value=" {!!$ayudasvisuales->fecha_actualizacion !!}" aria-label="Username" aria-describedby="basic-addon1" disabled readonly>
        </div>
    </div>

</div>
<br />
<div style="width: 100%; display: flex; align-items: center; justify-content: center;">
    <iframe src="{{ asset('/storage/public/ayudasvisuales/'.$ayudasvisuales->documento.'') }}" frameborder="0" width="75%" height="800px"></iframe>
</div>

<br />
<br />


@endsection()