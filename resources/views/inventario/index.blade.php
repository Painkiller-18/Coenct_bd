@extends('vistas.master')
@section('contenido_central')
<div class="row" style="margin-right: 2px; margin-left: 2px; height: 85%; margin-bottom: 0px; padding-bottom: 0px;">
    <div class="col-md-9 customized-scrollbar" style="overflow: scroll; height: 100%;">
        <div class="row">
            <div class="col-md-2" style="margin-right: 0px; padding: 0px;">
                <table class="table table-borderless" style="text-align: center; height: 100%;">
                    <thead>
                        <tr style="height: 72px;"></tr>
                        <tr>
                            <th scope="col" style="background-color: #0048A3; color:#fff; height: 73.52px; display: flex; align-items: center;">
                                <div style="width: 100%; text-align: center;">Operación</div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($rowsGrouped as $row)
                        <tr>
                            <th class="table-warning" style="font-size:20px; font-weight: bold; width:10%; text-align:center; vertical-align: middle; height:{{($row->operaciones)/$rows*100}}%;">{{$row->nombre}}</th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-10" style="margin-left: 0px; padding: 0px;">
                <table class="table table-borderless" style="text-align: center; height: 100%;">
                    <thead>
                        <tr>
                            <th scope="col" colspan="8" style=" background-color:red;">
                                <h2 style=" text-align: center; color: #fff;">INVENTARIO</h2>
                            </th>
                        </tr>
                        <tr style="height: 73.52px;">
                            <th scope="col" style="background-color: #0048A3; color:#fff; position: relative; min-width: 100px;">
                                <div style="position: absolute; top: 0; bottom: 0; left: 0; right: 0; width: 70%; height: 30%; margin: auto;">Nombre</div>
                            </th>
                            <th scope="col" style="background-color: #0048A3; color:#fff; position: relative; min-width: 150px;">
                                <div style="position: absolute; top: 0; bottom: 0; left: 0; right: 0; width: 70%; height: 30%; margin: auto;">Cod Almacén</div>
                            </th>
                            <th scope="col" style="background-color: #0048A3; color:#fff; position: relative; min-width: 180px;">
                                <div style="position: absolute; top: 0; bottom: 0; left: 0; right: 0; width: 70%; height: 30%; margin: auto;">Dibujo Validado</div>
                            </th>
                            <th scope="col" style="background-color: #0048A3; color:#fff; position: relative; min-width: 150px;">
                                <div style="position: absolute; top: 0; bottom: 0; left: 0; right: 0; width: 70%; height: 30%; margin: auto;">Pieza Ok</div>
                            </th>
                            <th scope="col" style="background-color: #0048A3; color:#fff; position: relative; min-width: 150px;">
                                <div style="position: absolute; top: 0; bottom: 0; left: 0; right: 0; width: 70%; height: 30%; margin: auto;">Pieza NOK</div>
                            </th>
                            <th scope="col" style="background-color: #0048A3; color:#fff; position: relative; min-width: 100px;">
                                <div style="position: absolute; top: 0; bottom: 0; left: 0; right: 0; width: 70%; height: 30%; margin: auto;">Mínimo</div>
                            </th>
                            <th scope="col" style="background-color: #0048A3; color:#fff; position: relative; min-width: 100px;">
                                <div style="position: absolute; top: 0; bottom: 0; left: 0; right: 0; width: 70%; height: 30%; margin: auto;">Máximo</div>
                            </th>
                            <th scope="col" style="background-color: #0048A3; color:#fff; position: relative; min-width: 120px;">
                                <div style="position: absolute; top: 0; bottom: 0; left: 0; right: 0; width: 70%; height: 30%; margin: auto;">Stock Real</div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($operaciones as $operacion)
                        <tr>
                            <th style="text-align:center; vertical-align: middle;">{{$operacion->nombre}}</th>
                            <th style="text-align:center; vertical-align: middle;">{{$operacion->codigo_alm}}</th>
                            <th style="text-align:center; vertical-align: middle;">Dibujo</th>
                            <th style="height: 200px; width: 200px; vertical-align: middle;">
                                <a type="button" data-toggle="modal" data-target="#modalPiezaOk_{{ $operacion->id }}" data-whatever="@getbootstrap" title="Click para ampliar la imagen">
                                    <img src="{{ asset('storage/public/Imgpieza/'.$operacion->pieza_ok) }}" style=" max-width: 100%; max-height: 100%;" />
                                </a>
                            </th>
                            <th style="height: 200px; width: 200px; vertical-align: middle;">
                                <a type="button" data-toggle="modal" data-target="#modalPiezaNoOk_{{ $operacion->id }}" data-whatever="@getbootstrap" title="Click para ampliar la imagen">
                                    <img src="{{ asset('storage/public/Imgpieza/'.$operacion->pieza_nok) }}" style=" max-width: 100%; max-height: 100%;" />
                                </a>
                            </th>
                            <!--Modal para ver imagen en pantalla completa-->
                            <div class="modal fade" id="modalPiezaOk_{{ $operacion->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal modal-dialog-centered">
                                    <div class="modal-content" style="background-color: transparent; display: flex; align-items: center; border: 0px; position: relative;">
                                        <i class="fas fa-times modal-btn" style="position: absolute; top: -4em; right: 0em;" data-dismiss="modal"></i>
                                        <div style="object-fit: cover;">
                                            <img src="{{ asset('storage/public/Imgpieza/'.$operacion->pieza_ok) }}" style=" width:100%; height:100%;" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Modal para ver imagen en pantalla completa-->
                            <div class="modal fade" id="modalPiezaNoOk_{{ $operacion->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal modal-dialog-centered">
                                    <div class="modal-content" style="background-color: transparent; display: flex; align-items: center; border: 0px; position: relative;">
                                        <i class="fas fa-times modal-btn" style="position: absolute; top: -4em; right: 0em;" data-dismiss="modal"></i>
                                        <div style="object-fit: cover;">
                                            <img src="{{ asset('storage/public/Imgpieza/'.$operacion->pieza_nok) }}" style=" width:100%; height:100%;" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <th style="text-align:center; vertical-align: middle;">{{$operacion->minimo}}</th>
                            <th style="text-align:center; vertical-align: middle;">{{$operacion->maximo}}</th>
                            <th style="text-align:center; vertical-align: middle;">{{$operacion->stock}}</th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <form id="form_piezas" action="{{ route('inventario.actualizar') }}" method="post" style="padding: 10px; margin-top: 73px;">
            @csrf
            {{ method_field('PUT') }}
            <h4 style="width: 100%; text-align: center;">Movimiento de piezas</h4>
            <label for="fecha">Fecha</label>
            <input class="form-control" id="fecha" name="fecha" readonly disabled>
            <br />
            <select id="pieza" class="form-control" aria-label="Default select example" name="pieza">
                <option>Selecciona una pieza</option>
                @foreach ($piezas as $pieza)
                @if(old('pieza') == $pieza->id)
                <option value="{{$pieza->id}}" selected="true">{{$pieza->codigo_alm}} | {{$pieza->nombre}}</option>
                @else
                <option value="{{$pieza->id}}">{{$pieza->codigo_alm}} | {{$pieza->nombre}}</option>
                @endif
                @endforeach
            </select>
            <label style="color: red;">@error('pieza') Se debe seleccionar una pieza. @enderror</label>
            <br />
            <label for="numero_piezas" class="col-form-label">Número de piezas</label>
            <input type="number" class="form-control" id="numero_piezas" name="numero_piezas" required value="{{old('numero_piezas')}}">
            <label style="color: red;">@error('numero_piezas') {{$message}} @enderror</label>
            <label for="usuario" class="col-form-label"><strong>Usuario</strong></label>
            <select class="form-control" aria-label="Default select example" name="usuario">
                <option>Selecciona un Usuario</option>
                @foreach ($user as $users )
                @if(old('usuario') == $users->nempleado)
                <option value="{{$users->nempleado}}" selected="true">{{$users->nempleado}} | {{$users->name}} {{$users->app}} {{$users->apm}}</option>
                @else
                <option value="{{$users->nempleado}}">{{$users->nempleado}} | {{$users->name}} {{$users->app}} {{$users->apm}}</option>
                @endif
                @endforeach
            </select>
            <label style="color: red;">@error('usuario') Seleccione un usuario. @enderror</label>
            <input type="password" name="password" id="password" autocomplete="new-password" placeholder="Contraseña" class="form-control" style="margin-top: 10px;" required>
            <label style="color: red;">@error('password') {{$message}} @enderror</label>
            <br />
            <input type="text" name="opcion" id="opcion" readonly="true" hidden>
            <div class="row">
                <div class="col-md-6" style="display: flex; align-items: center;">
                    <button id="btnDelete" class="btn btn-danger" style="margin: auto;">Quitar</button>
                </div>
                <div <?php if (auth()->user()->id_nivelacceso == '3') { ?> style="display: none;" <?php } ?> class="col-md-6" style="display: flex; align-items: center;">
                    <button id="btnAdd" class="btn btn-success" style="margin: auto;">Añadir</button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <span id="internetLabel" style="color: red;"></span>
                </div>
            </div>
        </form>
    </div>
</div>
<style>
    .customized-scrollbar::-webkit-scrollbar {
        width: 4px;
        height: 4px;
    }

    .customized-scrollbar::-webkit-scrollbar-thumb {
        border-radius: 20px;
        background-color: #c1c1c1;
    }

    .customized-scrollbar::-webkit-scrollbar-thumb:hover {
        background-color: #999999;
    }

    .customized-scrollbar:hover::-webkit-scrollbar {
        width: 8px;
        height: 8px;
    }

    .modal-btn {
        color: #fff;
        background-color: rgba(37, 37, 37, 0.35);
        padding: 1em;
        border-radius: 1em;
    }

    .modal-btn:hover {
        cursor: pointer;
        background-color: rgba(37, 37, 37, 0.75);
    }
</style>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        if(window.navigator.onLine){
            $('#btnDelete').attr('disabled', false);
            $('#internetLabel').html('');
        }else{
            $('#btnDelete').attr('disabled', true);
            $('#internetLabel').html('Esta operación requiere internet. Verifica tu conexión.');
        }
        $('#pieza').select2({
            theme: 'bootstrap'
        });
        $('#btnAdd').click(function(e) {
            e.preventDefault();
            $('#opcion').val('add');
            $('#form_piezas').submit();
        });
        $('#btnDelete').click(function(e) {
            e.preventDefault();
            $('#opcion').val('delete');
            $('#form_piezas').submit();
        });
        setDate();
        setInterval(setDate, 1000);
        window.addEventListener('offline', function() {
            $('#btnDelete').attr('disabled', true);
            $('#internetLabel').html('Esta operación requiere internet. Verifica tu conexión.');
        });
        window.addEventListener('online', function() {
            $('#btnDelete').attr('disabled', false);
            $('#internetLabel').html('');
        });
    });

    function setDate() {
        var currentDate = new Date();
        var day = format(currentDate.getDate());
        var month = format(currentDate.getMonth() + 1);
        var year = currentDate.getFullYear();
        var hours = format(currentDate.getHours());
        var minutes = format(currentDate.getMinutes());
        var date = day + '/' + month + '/' + year + ' ' + hours + ':' + minutes;
        $('#fecha').val(date);
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