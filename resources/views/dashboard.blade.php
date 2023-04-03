@extends('vistas.master')

@section('contenido_central')
<div class="row">
    <div class="col-md-3">
        <a class="btn texto-boton" href="{!! asset('Calendar/example/')!!}">
            <img src="/icon/calendar-date.svg" width="80px" alt="Calendario">
            <br/>
            <p style="color:black">Calendario</p>
        </a>
    </div>
    <div class="col-md-3" >
        <a class="btn texto-boton" href="{!! asset('ayudasvisuales')!!}">
            <img src="/icon/image.svg" width="80px" alt="Ayuda visual">
            <br/>
            <p style="color:black">Ayudas Visuales</p>
        </a>
    </div>
    @auth
    <div class="col-md-3" id="no_admin">
        <a class="btn texto-boton" href="{!! asset('registrolectura')!!}">
            <img src="/icon/book.svg" width="80px" alt="Registrar">
            <br/>
            <p style="color:black">Registro lectura</p>
        </a>
    </div>
            @endauth
    <div class="col-md-3" >
        <a class="btn texto-boton" href="{!! asset('inventario')!!}">
            <img src="/icon/box.svg"  width="80px" alt="Inventario">
            <br/>
            <p style="color:black">Inventario</p>
        </a>
    </div>
</div>
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-3" >
        <a class="btn texto-boton" href="{!! asset('analisisdesgaste')!!}">
            <img src="/icon/clipboard.svg"  width="80px" alt="Analisis de desgaste">
            <br/>
            <p style="color:black">Análisis de desgaste</p>
        </a>
    </div>
    <div class="col-md-3" >
        <a class="btn texto-boton" href="{!! asset('kaizen')!!}">
            <img src="/icon/gear.svg"  width="80px" alt="Kaizen">
            <br/>
            <p style="color:black">Kaizen</p>
        </a>
    </div>
    <div class="col-md-3" 
    <?php if (auth()->user()->id_nivelacceso == '2'){ ?> style="display: none;" <?php } ?>
    >
        <a class="btn texto-boton" href="{!! asset('register')!!}">
            <img src="/icon/person.svg"  width="80px" alt="Registrar">
            <br/>
            <p style="color:black">Registro de personal</p>
        </a>
    </div>
    <div class="col-md-1"></div>
</div>
<style>
</style>


@endsection()