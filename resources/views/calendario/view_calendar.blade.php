@extends('vistas.master')
@section('contenido_central')
<div class="row">
  <div class="col-md-2" style="margin-right: 0px; padding: 0px;">
    <table class="table table-borderless" style="text-align: center; height: 100%;">
      <thead>
        <tr style="height: 87.39px;"></tr>
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
      <tbody>
        <tr>
          <th scope="col" colspan="7">
            <h2 style=" text-align: center;">PIEZA CRÍTICA <span class="fig"></span></h2>
          </th>
          <th scope="col" colspan="19" style=" background-color:red;">
            <h2 style=" text-align: center; color: #fff;">CALENDARIO DE PIEZAS </h2>
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
          <th scope="col" style="background-color: #0048A3; color:#fff; position: relative; min-width: 150px;">
            <div style="position: absolute; top: 0; bottom: 0; left: 0; right: 0; width: 70%; height: 30%; margin: auto;">Vida Útil</div>
          </th>
          <th scope="col" style="background-color: #0048A3; color:#fff; position: relative; min-width: 160px;">
            <div style="position: absolute; top: 0; bottom: 0; left: 0; right: 0; width: 70%; height: 30%; margin: auto;">Mejora Kaizen</div>
          </th>
          <th scope="col" style="background-color: #0048A3; color:#fff"></th>
          <th scope="col" style="background-color: #0048A3; color:#fff; position: relative; min-width: 120px;">
            <div style="position: absolute; top: 0; bottom: 0; left: 0; right: 0; width: 80%; height: 30%; margin: auto;">Cambio 1</div>
          </th>
          <th scope="col" style="background-color: #0048A3; color:#fff; position: relative; min-width: 120px;">
            <div style="position: absolute; top: 0; bottom: 0; left: 0; right: 0; width: 80%; height: 30%; margin: auto;">Cambio 2</div>
          </th>
          <th scope="col" style="background-color: #0048A3; color:#fff; position: relative; min-width: 120px;">
            <div style="position: absolute; top: 0; bottom: 0; left: 0; right: 0; width: 80%; height: 30%; margin: auto;">Cambio 3</div>
          </th>
          <th scope="col" style="background-color: #0048A3; color:#fff; position: relative; min-width: 120px;">
            <div style="position: absolute; top: 0; bottom: 0; left: 0; right: 0; width: 80%; height: 30%; margin: auto;">Cambio 4</div>
          </th>
          <th scope="col" style="background-color: #0048A3; color:#fff; position: relative; min-width: 120px;">
            <div style="position: absolute; top: 0; bottom: 0; left: 0; right: 0; width: 80%; height: 30%; margin: auto;">Cambio 5</div>
          </th>
          <th scope="col" style="background-color: #0048A3; color:#fff; position: relative; min-width: 120px;">
            <div style="position: absolute; top: 0; bottom: 0; left: 0; right: 0; width: 80%; height: 30%; margin: auto;">Cambio 6</div>
          </th>
          <th scope="col" style="background-color: #0048A3; color:#fff; position: relative; min-width: 120px;">
            <div style="position: absolute; top: 0; bottom: 0; left: 0; right: 0; width: 80%; height: 30%; margin: auto;">Cambio 7</div>
          </th>
          <th scope="col" style="background-color: #0048A3; color:#fff; position: relative; min-width: 120px;">
            <div style="position: absolute; top: 0; bottom: 0; left: 0; right: 0; width: 80%; height: 30%; margin: auto;">Cambio 8</div>
          </th>
          <th scope="col" style="background-color: #0048A3; color:#fff; position: relative; min-width: 120px;">
            <div style="position: absolute; top: 0; bottom: 0; left: 0; right: 0; width: 80%; height: 30%; margin: auto;">Cambio 9</div>
          </th>
          <th scope="col" style="background-color: #0048A3; color:#fff; position: relative; min-width: 120px;">
            <div style="position: absolute; top: 0; bottom: 0; left: 0; right: 0; width: 80%; height: 30%; margin: auto;">Cambio 10</div>
          </th>
          <th scope="col" style="background-color: #0048A3; color:#fff; position: relative; min-width: 120px;">
            <div style="position: absolute; top: 0; bottom: 0; left: 0; right: 0; width: 80%; height: 30%; margin: auto;">Cambio 11</div>
          </th>
          <th scope="col" style="background-color: #0048A3; color:#fff; position: relative; min-width: 120px;">
            <div style="position: absolute; top: 0; bottom: 0; left: 0; right: 0; width: 80%; height: 30%; margin: auto;">Cambio 12</div>
          </th>
          <th scope="col" style="background-color: #0048A3; color:#fff; position: relative; min-width: 120px;">
            <div style="position: absolute; top: 0; bottom: 0; left: 0; right: 0; width: 80%; height: 30%; margin: auto;">Cambio 13</div>
          </th>
          <th scope="col" style="background-color: #0048A3; color:#fff; position: relative; min-width: 120px;">
            <div style="position: absolute; top: 0; bottom: 0; left: 0; right: 0; width: 80%; height: 30%; margin: auto;">Cambio 14</div>
          </th>
          <th scope="col" style="background-color: #0048A3; color:#fff; position: relative; min-width: 120px;">
            <div style="position: absolute; top: 0; bottom: 0; left: 0; right: 0; width: 80%; height: 30%; margin: auto;">Cambio 15</div>
          </th>
          <th scope="col" style="background-color: #0048A3; color:#fff; position: relative; min-width: 120px;">
            <div style="position: absolute; top: 0; bottom: 0; left: 0; right: 0; width: 80%; height: 30%; margin: auto;">Cambio 16</div>
          </th>
          <th scope="col" style="background-color: #0048A3; color:#fff; position: relative; min-width: 120px;">
            <div style="position: absolute; top: 0; bottom: 0; left: 0; right: 0; width: 80%; height: 30%; margin: auto;">Cambio 17</div>
          </th>
          <th scope="col" style="background-color: #0048A3; color:#fff; position: relative; min-width: 120px;">
            <div style="position: absolute; top: 0; bottom: 0; left: 0; right: 0; width: 80%; height: 30%; margin: auto;">Cambio 18</div>
          </th>
        </tr>
        @foreach($operaciones as $operacion)
        <tr>
          <th style="text-align:center; vertical-align: middle;">{{$operacion->nombre}}</th>
          <th style="text-align:center; vertical-align: middle;">{{$operacion->codigo_alm}}</th>
          <th style="text-align:center; vertical-align: middle;">Dibujo Validado</th>
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
                <i <?php if (auth()->user()->id_nivelacceso == '3'){ ?>  style="display: none;" <?php } ?> class="fas fa-edit modal-btn" style="position: absolute; top: -4em; left: 0em;" data-dismiss="modal" data-toggle="modal" data-target="#modalImageEdit_{{$operacion->id}}"></i>
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
                <i <?php if (auth()->user()->id_nivelacceso == '3'){ ?>  style="display: none;" <?php } ?> class="fas fa-edit modal-btn" style="position: absolute; top: -4em; left: 0em;" data-toggle="modal" data-target="#modalImageEdit_{{$operacion->id}}"></i>
                <i class="fas fa-times modal-btn" style="position: absolute; top: -4em; right: 0em;" data-dismiss="modal"></i>
                <div style="object-fit: cover;">
                  <img src="{{ asset('storage/public/Imgpieza/'.$operacion->pieza_nok) }}" style=" width:100%; height:100%;" />
                </div>
              </div>
            </div>
          </div>
          <!-- Fom modificar imagen-->
          <div class="modal fade" id="modalImageEdit_{{$operacion->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Modificar imagen </h1>
                  <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="row container">
                    <form action="{{ route('event.imagen', $operacion->id) }}" method="post" enctype="multipart/form-data">
                      @csrf
                      {{ method_field('PUT') }}
                      <div class="row">
                        <div class="col-md-6 ms-auto">
                          <label for="recipient-name" class="col-form-label">Pieza OK </label>
                          <input id="uploadImage1_{{$operacion->id}}" class="form-control" type="file" accept="image/png, image/jpeg" id="pieza_ok" name="pieza_ok" value='{{$operacion->pieza_ok}}' onchange="previewImage('1_'+{{$operacion->id}});">
                          <br />
                          <div style="height: 150px; width: 100%; display: flex; align-items: center; justify-content: center;">
                            <img id="uploadPreview1_{{$operacion->id}}" src="{{ asset('storage/public/Imgpieza/'.$operacion->pieza_ok) }}" style="max-width:100%; max-height:100%;" alt="">
                          </div>
                        </div>

                        <div class="col-md-6 ms-auto">
                          <label for="recipient-name" class="col-form-label">Pieza NOK</label>
                          <input id="uploadImage2_{{$operacion->id}}" class="form-control" type="file" accept="image/png, image/jpeg" id="pieza_nok" name="pieza_nok" value="{{$operacion->pieza_nok}}" onchange="previewImage('2_'+{{$operacion->id}});">
                          <br />
                          <div style="height: 150px; width: 100%; display: flex; align-items: center; justify-content: center;">
                            <img id="uploadPreview2_{{$operacion->id}}" src="{{ asset('storage/public/Imgpieza/'.$operacion->pieza_nok) }}" style="max-width:100%; max-height:100%;" alt="">
                          </div>
                        </div>
                      </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button id="cancel_btn1_{{$operacion->id}}" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                  <button type="submmit" class="btn btn-primary">Guardar Cambios</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          @if($operacion->vida_comp <= 3) <th style="text-align:center; vertical-align: middle; background-color: #F5C92B;">{{$operacion->vida_util}}</th>
            @else
            <th style="text-align:center; vertical-align: middle;">{{$operacion->vida_util}}</th>
            @endif
            <th style="text-align:center; vertical-align: middle;"><a type="button" frameborder="0" data-toggle="modal" data-target="#modalKaizen_{{$operacion->id_kaizen}}" title="{{$operacion->nombre_kaizen}}"><img src="/icon/pdf.svg" alt="pdf" width="80px" height="80px"></a></th>
            <!--Modal Lectura Kaizen-->
            <div class="modal fade" id="modalKaizen_{{$operacion->id_kaizen}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">{{$operacion->nombre_kaizen}}</h1>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <iframe src="{{ asset('/storage/public/kaizen/'.$operacion->documento_kaizen.'') }}" frameborder="0" width="100%" height="800px" ></iframe>
                  </div>
                </div>
              </div>
            </div>
            <th>
              <table style="font-size: xx-small;">
                <tr>
                  <th style="background-color: #F5C92B;">PLAN</th>
                </tr>
                <tr>
                  <th>REAL</th>
                </tr>
                <tr>
                  <th>COMENTARIOS</th>
                </tr>
              </table>
            </th>
            @foreach($cambios as $cambio)
            @if($cambio->id_calendario == $operacion->id)
            <th>
              <table class="table table-bordered" style="font-size: xx-small; width: 200px;">
                <tr>
                  <th style="background-color: #F5C92B; font-size: x-small;"><strong>{{$cambio->fecha}}</strong></th>
                </tr>
                @if($cambio->status == 'Completado')
                <tr>
                  <th style="background-color: springgreen; height: 38.5px;"></th>
                </tr>
                <tr>
                  <th>
                    <div style="width: 100%; height: 30px; overflow: hidden; text-overflow: ellipsis;"><a type="button" data-toggle="modal" data-target="#modalComentario_{{ $cambio->id }}" data-whatever="@getbootstrap" title="Comentarios">{{$cambio->comentarios}}</a></div>
                  </th>
                </tr>
                <div class="modal fade" id="modalComentario_{{ $cambio->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Comentarios</h1>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <p>{{$cambio->comentarios}}</p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                      </div>
                    </div>
                  </div>
                </div>
                @endif
                @if($cambio->status == 'Pendiente')
                <tr>
                  <th><a class="badge text-bg-danger" style="width:80px; font-size: smaller;" type="button" data-toggle="modal" data-target="#modal_{{ $cambio->id }}" data-whatever="@getbootstrap" title="{{$operacion->nombre_operacion}}">{{$operacion->nombre_operacion}}</a></th>
                </tr>
                <div class="modal fade" id="modal_{{ $cambio->id }}" tabindex="-1" role="dialog" data-backdrop="static" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Detalle de la Actividad</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form action="{{ route('event.update', $cambio->id) }}" method="post">
                          @csrf
                          {{ method_field('PUT') }}
                          <div class="row">
                            <div class="col-md-6 ms-auto">
                              <label for="recipient-name" class="col-form-label">Operación:</label>
                              <input type="text" class="form-control" id="recipient-name" value="  {{ $operacion->nombre_operacion }}" name="ope_name" readonly="readonly">
                            </div>
                            <div class="col-md-6 ms-auto">
                              <label for="recipient-name" class="col-form-label">Nombre:</label>
                              @auth
                              <input type="text" class="form-control" id="recipient-name" value="{{$operacion->nombre}}" name="nombre" readonly="readonly">
                              @endauth
                            </div>
                            <div class="col-md-6 ms-auto">
                              <label for="recipient-name" class="col-form-label">Cód de Almacén:</label>
                              <input type="text" class="form-control" id="recipient-name" value='{{ $operacion->codigo_alm }}' name="codigo_alm" readonly="readonly">
                            </div>
                            <div class="col-md-6 ms-auto">
                              <label for="recipient-name" class="col-form-label">Cód Sap:</label>
                              <input type="text" class="form-control" id="recipient-name" value=' {{ $operacion->codigo_sap }}' name="codigo_sap" readonly="readonly">
                            </div>

                            <div class="col-md-6 ms-auto">
                              <label for="recipient-name" class="col-form-label">Pieza OK </label>
                              <img <?php if (auth()->user()->id_nivelacceso == '3'){ ?>  style="display: none;" <?php } ?> type="button" src="/pic/pen.svg" data-toggle="modal" data-target="#modaledit_{{$operacion->id}}">
                              <input type="text" class="d-none" id="recipient-name" value='{{ $operacion->pieza_ok }}' name="pieza_ok" readonly="readonly">
                              <div class="col-md-12">
                                <img src="{{ asset('storage/public/Imgpieza/'.$operacion->pieza_ok) }}" style="width:100%; height:300px;" alt="">
                              </div>
                            </div>
                            <div class="col-md-6 ms-auto">
                              <label for="recipient-name" class="col-form-label">Pieza NOK</label>
                              <img <?php if (auth()->user()->id_nivelacceso == '3'){ ?>  style="display: none;" <?php } ?> type="button" src="/pic/pen.svg" data-toggle="modal" data-target="#modaledit_{{$operacion->id}}">
                              <input type="text" class="d-none" id="recipient-name" value='{{ $operacion->pieza_nok }}' name="pieza_nok" readonly="readonly">
                              <div class="col-md-12">
                                <img src="{{ asset('storage/public/Imgpieza/'.$operacion->pieza_nok) }}" style="width:100%; height:300px;" alt="">
                              </div>
                            </div>

                            <div class="d-none">
                              <label for="recipient-name" class="col-form-label">Vida útil</label>
                              <input class="col-md-6 ms-auto" type="checkbox" id="flexCheckDefault">
                              <input type="text" class="form-control" id="vidautil" value='{{ $operacion->vida_util }}' name="vida_util" disabled="">
                            </div>

                            <div class="d-none">
                              <label for="recipient-name" class="d-none">Status</label>
                              <input type="text" class="form-control" id="recipient-name" value='{{ $operacion->status }}' name="status" readonly="readonly">
                            </div>
                            <div class="col-md-6 ms-auto">
                              <label for="recipient-name" class="col-form-label">Fecha</label>
                              <input type="date" class="form-control" id="fecha1" value='' name="fecha_cambio" readonly="readonly">
                            </div>
                            <div class="col-md-6 ms-auto">
                              <label for="recipient-name" class="col-form-label">Kaizen</label>
                              <input type="text" class="form-control" id="" value='{{$operacion->nombre_kaizen}}' readonly="readonly">
                              <input type="text" class="d-none" id="recipient-name" value="{{$operacion->id_kaizen}}" name="id_kaizen">
                            </div>
                            <div class="col-md-12 ms-auto">
                              <label for="recipient-name" class="col-form-label">Ayuda Visual</label>
                              <iframe src="{{ asset('/storage/public/ayudasvisuales/'.$operacion->documento_ayuda.'') }}" frameborder="0" width="100%" height="800px"></iframe>
                              <input type="text" class="d-none" id="recipient-name" value="{{ $operacion->id_ayuda_visual }}" name="id_ayuda_visual" readonly="">
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
                              @if($fecha_actual>=strtotime($cambio->fecha_comp))
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                              <button type="button" data-toggle="modal" data-target="#modalPospuesto_{{ $cambio->id }}" class="btn btn-primary" name="pospuesto">Posponer</button>
                              <button type="button" data-toggle="modal" data-target="#modalCompletado_{{ $cambio->id }}" class="btn btn-success" name="completo" disabled>Completado</button>
                              @else
                              <p>Esta operación solo puede realizarse a partir de la fecha establecida</p>
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                              @endif

                            </div>

                        </form>

                        <!--Form completado-->
                        <!-- Fom Terminado Fecha-->
                        <div class="modal fade" id="modalCompletado_{{ $cambio->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Vida útil</h1>
                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <form action="{{ route('event.completado', $cambio->id) }}" method="post" enctype="multipart/form-data">
                                  @csrf
                                  {{ method_field('PUT') }}
                                  <div class="col-md-6">
                                    <input type="date" class="d-none" id="fecha1" value='' name="fecha_cambio" readonly="readonly">
                                    <label for="recipient-name" class="col-form-label">Vida útil</label>
                                    <input type="text" class="form-control" id="vidautil" value='{{ $operacion->vida_util }}' name="vida_util" readonly="readonly">
                                  </div>
                                  <div class="col-9" style="color: black;">
                                    <label for="recipient-name" class="col-form-label">Usuario</label>
                                    <select class="form-control" required aria-label="Default select example" name="nemple">
                                      <option selected="true">Selecciona un usuario</option>
                                      @foreach ($user as $users )
                                      <option value="{{$users->nempleado}}">{{$users->nempleado}} | {{$users->name}} {{$users->app}} {{$users->apm}}</option>
                                      @endforeach
                                    </select>
                                    <br>
                                    <input type="password" required name="pass" placeholder="Contraseña" class="form-control">
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
                        <!--Modal pospuesto-->
                        <!--Form completado-->
                        <!-- Fom Terminado Fecha-->
                        <div class="modal fade" id="modalPospuesto_{{ $cambio->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Descripción</h1>
                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <form action="{{ route('event.pospuesto', $cambio->id) }}" method="post" enctype="multipart/form-data">
                                  @csrf
                                  {{ method_field('PUT') }}
                                  <div class="col-md-12 ms-auto">
                                    <input type="date" class="d-none" id="fecha1" value='' name="fecha_cambio" readonly="readonly">
                                    <label for="recipient-name" class="col-form-label">Descripción</label>
                                    <textarea class="form-control" id="descripcion" name="descripcion" minlength="50" required></textarea>
                                    <p style="font-size: small; text-align: justify; font-family: Arial, Helvetica, sans-serif;">*La descripción debe contar con al menos 50 caracteres.</p>
                                  </div>
                                  <div class="col-9" style="color: black;">
                                    <label for="recipient-name" class="col-form-label">Usuario</label>
                                    <select class="form-control" required aria-label="Default select example" name="nemple">
                                      <option selected="true">Selecciona un usuario</option>
                                      @foreach ($user as $users )
                                      <option value="{{$users->nempleado}}">{{$users->nempleado}} | {{$users->name}} {{$users->app}} {{$users->apm}}</option>
                                      @endforeach
                                    </select>
                                    <br>
                                    <input type="password" name="pass" id="" value="" placeholder="Contraseña" required class="form-control">
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
                        <!-- Fom modificar imagen-->
                        <div class="modal fade" id="modaledit_{{$operacion->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modificar imagen </h1>
                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <div class="row container">
                                  <form action="{{ route('event.imagen', $operacion->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    {{ method_field('PUT') }}
                                    <div class="row">
                                      <div class="col-md-6 ms-auto">
                                        <label for="recipient-name" class="col-form-label">Pieza OK </label>
                                        <input id="uploadImage3_{{$operacion->id}}" class="form-control" type="file" accept="image/png, image/jpeg" id="pieza_ok" name="pieza_ok" value='{{$operacion->pieza_ok}}' onchange="previewImage('3_'+{{$operacion->id}});">
                                        <br />
                                        <div style="height: 150px; width: 100%; display: flex; align-items: center; justify-content: center;">
                                          <img id="uploadPreview3_{{$operacion->id}}" src="{{ asset('storage/public/Imgpieza/'.$operacion->pieza_ok) }}" style="max-width:100%; max-height:100%;" alt="">
                                        </div>
                                      </div>

                                      <div class="col-md-6 ms-auto">
                                        <label for="recipient-name" class="col-form-label">Pieza NOK</label>
                                        <input id="uploadImage4_{{$operacion->id}}" class="form-control" type="file" accept="image/png, image/jpeg" id="pieza_nok" name="pieza_nok" value="{{$operacion->pieza_nok}}" onchange="previewImage('4_'+{{$operacion->id}});">
                                        <br />
                                        <div style="height: 150px; width: 100%; display: flex; align-items: center; justify-content: center;">
                                          <img id="uploadPreview4_{{$operacion->id}}" src="{{ asset('storage/public/Imgpieza/'.$operacion->pieza_nok) }}" style="max-width:100%; max-height:100%;" alt="">
                                        </div>
                                      </div>
                                    </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="submmit" class="btn btn-primary">Guardar Cambios</button>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                        @endif
                        @if($cambio->status == 'Pospuesto')
                        <tr>
                          <th style="background-color: red; height: 38.5px;"></th>
                        </tr>
                        <tr>
                          <th>
                            <div style="width: 100%; height: 30px; overflow: hidden; text-overflow: ellipsis;"><a type="button" data-toggle="modal" data-target="#modalComentario_{{ $cambio->id }}" data-whatever="@getbootstrap" title="Comentarios">{{$cambio->comentarios}}</a></div>
                          </th>
                          <div class="modal fade" id="modalComentario_{{ $cambio->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h1 class="modal-title fs-5" id="exampleModalLabel">Comentarios</h1>
                                  <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  <p style="text-align: justify;">{{$cambio->comentarios}}</p>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </tr>
                        @endif
              </table>
            </th>
            @endif
            @endforeach
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
<style>
  .fig {
    position: absolute;
    margin-left: 50px;
    margin-right: auto;
    float: right;
    width: 100px;
    height: 40px;
    border: 2px solid;
    background-color: #F5C92B;
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
@endsection()
@section('scripts')
<script>
  function previewImage(nb) {
    var reader = new FileReader();
    reader.readAsDataURL(document.getElementById('uploadImage' + nb).files[0]);
    reader.onload = function(e) {
      document.getElementById('uploadPreview' + nb).src = e.target.result;
    };
  }
</script>
@endsection()