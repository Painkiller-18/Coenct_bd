<nav class="navbar navbar-expand-lg fixed-top" style="background-color:#E1E9EB;">
    <div class="log"></div>
    <a class="navbar-brand " href="{!! asset('dashboard')!!}">
        <img src="/pic/logo.png" alt="Bosch" width="150px">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarItems" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id=navbarItems style="position: absolute; right: 0; padding-right: 25px;">
        <div class="navbar-nav">
            <a class="nav-item nav-link" href="{!! asset('dashboard')!!}" title="Inicio"><img src="/icon/house.svg" width="25" alt=""></a>
            <a class="nav-item nav-link" href="{!! asset('Calendar/example/')!!}">Calendario</a>
            <a class="nav-item nav-link" href="{!! asset('ayudasvisuales')!!}">Ayudas visuales</a>
            <a class="nav-item nav-link" href="{!! asset('registrolectura')!!}">Registro lectura</a>
            <a class="nav-item nav-link" href="{!! asset('inventario')!!}">Inventario</a>
            <a class="nav-item nav-link" href="{!! asset('analisisdesgaste')!!}">Análisis de desgaste</a>
            <a class="nav-item nav-link" href="{!! asset('kaizen')!!}">Kaizen</a>
            <a id="1" class="nav-item nav-link" href="{!! asset('register')!!}" <?php if (auth()->user()->id_nivelacceso == '3'){ ?>  style="display: none;" <?php } ?> <?php if (auth()->user()->id_nivelacceso == '2'){ ?>  style="display: none;" <?php } ?>>Registro</a>
            <a class="nav-item nav-link" href="{!! asset('logout')!!}" title="Cerrar Sesión"><img src="/icon/out.svg" width="25" alt=""></a>
        </div>
        
        <ul class="navbar-text" style="margin-top:1rem; font-size: small;">
            @auth
            <strong>{{auth()->user()->name}} {{auth()->user()->app}} {{auth()->user()->apm}}</strong>
            <span id="rol" style="display:none;">{{auth()->user()->id_nivelacceso}}</span>
            <br>
            <strong> No.empleado: {{auth()->user()->nempleado}} </strong>
            @endauth
        </ul>
    </div>
</nav>
<style>
    a{
        color: black;
    }
    .log {
        padding-top: 10px;
        background-image: url(https://boschferramentasbrasil.vteximg.com.br/arquivos/supergraphic.png);
        background-size: 100%;
        background-repeat: no-repeat;
        position: fixed;
        width: 100%;
        top: 0;
        left: 0;
    }
</style>
@section('scripts')
<script>
    $(document).ready(function () {
        var rol = $('#rol').html();
        if (rol >= '3') {
            $('#1').remove();
        }
    });
</script>
@endsection