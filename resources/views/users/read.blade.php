@extends('vistas.master')
@section('contenido_central')
<a href="{!! asset('register') !!}" style="margin-left: 2em; color:black;"><i class="fas fa-arrow-left"></i> Regresar</a>
<div style="width: 75%; margin-left: 12.5%; margin-right: 12.5%;">
    <h1>Detalle de usuarios</h1>
    <div class="row">
        <div class="col-md-4">
            <label for="name">Nombre:</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text fa fa-user"></span>
                </div>
                <input name="nombre" class="form-control" value="{!! $users->name !!}" readonly placeholder="Nombre" aria-label="Username" aria-describedby="basic-addon1">
            </div>
        </div>
        <div class="col-md-4">
            <label for="app">Apellido Paterno:</label>
            <div class="input-group mb-3">
                <input name="app" class="form-control" value="{!! $users->app !!}" readonly placeholder="Apellido Paterno" aria-label="Username" aria-describedby="basic-addon1">
            </div>
        </div>
        <div class="col-md-4">
            <label for="apm">Apellido Materno:</label>
            <div class="input-group mb-3">
                <input name="apm" class="form-control" value="{!! $users->apm !!}" readonly placeholder="Apellido Materno" aria-label="Username" aria-describedby="basic-addon1">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label for="email">Correo electrónico:</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text fas fa-at"></span>
                </div>
                <input name="email" class="form-control" value="{!! $users->email !!}" readonly placeholder="Correo electrónico" aria-label="Username" aria-describedby="basic-addon1">
            </div>
        </div>
        <div class="col-md-6">
            <label for="nempleado">Número de empleado:</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text fas fa-id-card"></span>
                </div>
                <input name="nempleado" class="form-control" value="{!! $users->nempleado !!}" readonly placeholder="Número de empleado" aria-label="Username" aria-describedby="basic-addon1">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <label for="depto">Departamento:</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text fa fa-warehouse"></span>
                </div>
                <input name="depto" class="form-control" value="{!! $users->departamento->nombre !!}" readonly placeholder="Departamento" aria-label="Username" aria-describedby="basic-addon1">
            </div>
        </div>
        <div class="col-md-3">
            <label for="puesto">Puesto:</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text fa fa-id-badge"></span>
                </div>
                <input name="puesto" class="form-control" value="{!! $users->puesto->nombre !!}" readonly placeholder="Puesto" aria-label="Username" aria-describedby="basic-addon1">
            </div>
        </div>
        <div class="col-md-3">
            <label for="nivel">Nivel de acceso:</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text fa fa-layer-group"></span>
                </div>
                <input name="nivel" class="form-control" value="{!! $users->nivelacceso->nombre !!}" readonly placeholder="Nivel de acceso" aria-label="Username" aria-describedby="basic-addon1">
            </div>
        </div>
        <div class="col-md-3">
            <label for="area">Área de trabajo:</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text fa fa-briefcase"></span>
                </div>
                <input name="area" class="form-control" value="{!! $users->areatrabajo->nombre !!}" readonly placeholder="Área de trabajo" aria-label="Username" aria-describedby="basic-addon1">
            </div>
        </div>
    </div>
</div>
<br />

@endsection()