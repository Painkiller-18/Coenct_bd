@extends('vistas.master')
@section('contenido_central')

<style>
  body {
    font-family: 'Exo', sans-serif;
  }

  .header-col {
    background: #E3E9E5;
    color: #536170;
    text-align: center;
    font-size: 20px;
    font-weight: bold;
  }

  .header-calendar {
    width: 1140px;
    background: #EE192D;
    color: white;
  }

  .box-day {
    border: 1px solid #E3E9E5;
    height: 150px;
  }

  .box-dayoff {
    border: 1px solid #E3E9E5;
    height: 150px;
    background-color: #ccd1ce;
  }

  .container {
    width: 100%;
    margin-top: 150px;
    margin-bottom: 150px;
    background: white;
  }
</style>
<div class="container">
  @include('sweetalert::alert')
  <div class="row header-calendar">
    <div class="col" style="display: flex; justify-content: space-between; padding: 10px;">
      <a href="{{ asset('/Calendar/event/') }}/<?= $data['last']; ?>" style="margin:10px;">
        <i class="fas fa-chevron-circle-left" style="font-size:30px;color:white;"></i>
      </a>
      <h2 style="font-weight:bold;margin:10px;"><?= $mespanish; ?> <small><?= $data['year']; ?></small></h2>
      <a href="{{ asset('/Calendar/event/') }}/<?= $data['next']; ?>" style="margin:10px;">
        <i class="fas fa-chevron-circle-right" style="font-size:30px;color:white;"></i>
      </a>
    </div>
  </div>
  <div class="row">
    <div class="col header-col">Lunes</div>
    <div class="col header-col">Martes</div>
    <div class="col header-col">Miercoles</div>
    <div class="col header-col">Jueves</div>
    <div class="col header-col">Viernes</div>
    <div class="col header-col">Sabado</div>
    <div class="col header-col">Domingo</div>
  </div>
  <!-- inicio de semana -->
  @foreach ($data['calendar'] as $weekdata)
  <div class="row">
    <!-- ciclo de dia por semana -->
    @foreach ($weekdata['datos'] as $dayweek)
    @if ($dayweek['mes']==$mes)
    <div class="col box-day">
      {{ $dayweek['dia']  }}
      <!-- evento -->
      @foreach ($dayweek['evento'] as $event)
      <div>
        <a class="badge text-bg-danger" style="width:80px;" type="button" data-toggle="modal" data-target="#exampleModal_{{ $event->id }}" data-whatever="@getbootstrap">{{ $event->ope_name}}</a>
      </div>
      <div class="modal fade" id="exampleModal_{{ $event->id }}" tabindex="-1" role="dialog" data-backdrop="static" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Detalle de la Actividad</h5>
              <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="{{ route('event.update', $event->id) }}" method="post">
                @csrf
                {{ method_field('PUT') }}
                <div class="row">
                  <div class="col-md-6 ms-auto">
                    <label for="recipient-name" class="col-form-label">Operación:</label>
                    <input type="text" class="form-control" id="recipient-name" value="  {{ $event->ope_name }}" name="ope_name" readonly="readonly">
                  </div>
                  <div class="col-md-6 ms-auto">
                    <label for="recipient-name" class="col-form-label">Nombre:</label>
                    @auth
                    <input type="text" class="form-control" id="recipient-name" value="{{$event->nombre}}" name="nombre" readonly="readonly">
                    @endauth
                  </div>
                  <div class="col-md-6 ms-auto">
                    <label for="recipient-name" class="col-form-label">Cód de Almacén:</label>
                    <input type="text" class="form-control" id="recipient-name" value='{{ $event->codigo_alm }}' name="codigo_alm" readonly="readonly">
                  </div>
                  <div class="col-md-6 ms-auto">
                    <label for="recipient-name" class="col-form-label">Cód Sap:</label>
                    <input type="text" class="form-control" id="recipient-name" value=' {{ $event->codigo_sap }}' name="codigo_sap" readonly="readonly">
                  </div>

                  <div class="col-md-6 ms-auto">
                    <label for="recipient-name" class="col-form-label">Pieza OK </label>
                    <img type="button" src="/pic/pen.svg" data-toggle="modal" data-target="#modaledit_{{$event->id}}">
                    <input type="text" class="d-none" id="recipient-name" value='{{ $event->pieza_ok }}' name="pieza_ok" readonly="readonly">
                    <div class="col-md-12">
                      <img src="{{ asset('storage/public/Imgpieza/'.$event->pieza_ok) }}" style="width:100%; height:300px;" alt="">
                    </div>
                  </div>
                  <div class="col-md-6 ms-auto">
                    <label for="recipient-name" class="col-form-label">Pieza NOK</label>
                    <img type="button" src="/pic/pen.svg" data-toggle="modal" data-target="#modaledit_{{$event->id}}">
                    <input type="text" class="d-none" id="recipient-name" value='{{ $event->pieza_nok }}' name="pieza_nok" readonly="readonly">
                    <div class="col-md-12">
                      <img src="{{ asset('storage/public/Imgpieza/'.$event->pieza_nok) }}" style="width:100%; height:300px;" alt="">
                    </div>
                  </div>

                  <div class="d-none">
                    <label for="recipient-name" class="col-form-label">Vida útil</label>
                    <input class="col-md-6 ms-auto" type="checkbox" id="flexCheckDefault">
                    <input type="text" class="form-control" id="vidautil" value='{{ $event->vida_util }}' name="vida_util" disabled="">
                  </div>

                  <div class="d-none">
                    <label for="recipient-name" class="d-none">Status</label>
                    <input type="text" class="form-control" id="recipient-name" value='{{ $event->status }}' name="status" readonly="readonly">
                  </div>
                  <div class="col-md-6 ms-auto">
                    <label for="recipient-name" class="col-form-label">Fecha</label>
                    <input type="date" class="form-control" id="fecha1" value='{{ $event->fecha_cambio}}' name="fecha_cambio" readonly="readonly">
                  </div>
                  <div class="col-md-6 ms-auto">
                    <label for="recipient-name" class="col-form-label">Kaizen</label>
                    <input type="text" class="form-control" id="" value='{{ $event->kainombre}}' readonly="readonly">
                    <input type="text" class="d-none" id="recipient-name" value="{{ $event->id_kaizen }}" name="id_kaizen">
                  </div>
                  <div class="col-md-12 ms-auto">
                    <label for="recipient-name" class="col-form-label">Ayuda Visual</label>
                    <iframe src="{{ asset('/storage/public/'.$event->ayudadocumento.'') }}" frameborder="0" width="100%" height="800px"></iframe>
                    <input type="text" class="d-none" id="recipient-name" value="{{ $event->id_ayuda_visual }}" name="id_ayuda_visual" readonly="">
                  </div>
                  @auth
                  <div class="form-check">
                    <input class="form-input" id="chk1" type="checkbox" name="aviso_lectura" value="{{auth()->user()->id}}" onclick="completo.disabled = !this.checked">
                    @endauth
                    <label class="form-check-label" for="flexCheckIndeterminate">
                      Leí la documentación requerida para poder realizar la actividad correspondiente.
                    </label>
                  </div>
                  <div class="modal-footer" style=" width:100%; height: 180px; margin-top:-80px;">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#examples_{{ $event->id }}">Posponer</button>
                    <button type="button" data-toggle="modal" data-target="#example_{{ $event->id }}" class="btn btn-success" name="completo" disabled>Completado</button>

              </form>
              <!-- Fom modificar imagen-->
              <div class="modal fade" id="modaledit_{{$event->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Modificar imagen </h1>
                      <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div class="row container">
                        <form action="{{ route('event.imagen', $event->id) }}" method="post" enctype="multipart/form-data">
                          @csrf
                          {{ method_field('PUT') }}
                          <div class="row">
                            <div class="col-md-6 ms-auto">
                              <label for="recipient-name" class="col-form-label">Pieza OK </label>
                              <input class="form-control" type="file" accept="image/png, image/jpeg" id="pieza_ok" name="pieza_ok" value='{{$event->pieza_ok}}'>
                              <img src="{{ asset('storage/public/Imgpieza/'.$event->pieza_ok) }}" style="width:100%; height:150px;" alt="">
                            </div>

                            <div class="col-md-6 ms-auto">
                              <label for="recipient-name" class="col-form-label">Pieza NOK</label>
                              <input type="text" class="d-none" name="pieza_nok" value="{{$event->pieza_nok}}">
                              <input class="form-control" type="file" accept="image/png, image/jpeg" id="pieza_nok" name="pieza_nok">
                              <img src="{{ asset('storage/public/Imgpieza/'.$event->pieza_nok) }}" style="width:100%; height:150px;" alt="">
                            </div>
                          </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submmit" class="btn btn-primary">Save changes</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Fom modificar imagen-->
              <!-- Fom Terminado Fecha-->
              <div class="modal fade" id="example_{{ $event->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Vida útil</h1>
                      <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form action="{{ route('event.completado', $event->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="col-md-6">
                          <input type="date" class="d-none" id="fecha1" value='{{ $event->fecha_cambio}}' name="fecha_cambio" readonly="readonly">
                          <label for="recipient-name" class="col-form-label">Vida útil</label>
                          <input type="text" class="form-control" id="vidautil" value='{{ $event->vida_util }}' name="vida_util" readonly="readonly">
                        </div>
                        <div class="col-9" style="color: black;">
                          <label for="recipient-name" class="col-form-label">Usuario</label>
                          <select class="form-control" aria-label="Default select example" name="nemple">
                            <option>Seleccioaddna un Usuario</option>
                            @foreach ($user as $users )
                            <option value="{{$users->nempleado}}">{{$users->nempleado}} | {{$users->name}} {{$users->app}} {{$users->apm}}</option>
                            @endforeach
                          </select>
                          <br>
                          <input type="password" name="pass" id="" value="" placeholder="Contraseña" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                      <button type="submmit" class="btn btn-primary">Guardar</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>


              <!-- Fom Terminado Fecha-->
              <!-- Fom Posponer Fecha-->
              <div class="modal fade" id="examples_{{ $event->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Descripción</h1>
                      <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form action="{{ route('event.pospuesto', $event->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="col-md-12 ms-auto">
                          <input type="date" class="d-none" id="fecha1" value='{{ $event->fecha_cambio}}' name="fecha_cambio" readonly="readonly">
                          <label for="recipient-name" class="col-form-label">Descripción</label>
                          <textarea class="form-control" name="descripcion" id="floatingTextarea"></textarea>
                        </div>
                        <br>
                        <div class="col-9" style="color: black;">
                          <label for="recipient-name" class="col-form-label">Usuario</label>
                          <select class="form-control" aria-label="Default select example" name="nempleado">
                            <option>Seleccasdiona un Usuario</option>
                            @foreach ($user as $users )
                            <option value="{{$users->nempleado}}">{{$users->nempleado}} | {{$users->name}} {{$users->app}} {{$users->apm}}</option>
                            @endforeach
                          </select>
                          <br>
                          <input type="password" name="password" id="" value="" placeholder="Contraseña" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                      <button type="submmit" class="btn btn-primary">Guardar</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Fom Posponer Fecha-->
        </div>
      </div>
    </div>
  </div>
  @endforeach
</div>
@else
<div class="col box-dayoff">
</div>
@endif
@endforeach
</div>
@endforeach
</div>
<script>
  function cambiarBtn() {
    $("#pieza_ok").removeClass("d-none");
    $("#pieza_ok").addClass("form-control");

  }
</script>
@endsection()