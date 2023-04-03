@extends('vistas.master')
@section('contenido_central')
<a href="{!! asset('kaizen') !!}" style="margin-left: 2em; color:black;"><i class="fas fa-arrow-left"></i> Regresar</a>
<div class="" style="background: white; width:80%; border:2px solid; margin: 0 auto; ">
  <div class="container">
    <h1 style="color: white;">Crear Kaizen</h1>
    <form action="{{ route('contact.send') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="row justify-content-between">
        <div class="col-4" style="color: black;">
          <label for="validationDefault01">Nombre</label>
          <input type="text" class="form-control" id="validationDefault01" name="nombre" value="">
        </div>
      </div>
      <div class="row justify-content-between">
        <div class="col-6 col-sm-4" style="color: black;">
          <label for="validationDefault01">Área de Mejora:</label>
          <input type="text" class="form-control" id="validationDefault01" name="area" value="">
        </div>
        <div class="col-2">
          <label for="validationDefault01">Página</label>
          <input type="text" class="form-control" id="validationDefault01" name="pagina" value="">
        </div>
        <div class="col-2" style="margin-left:-400px;">
          <label for="validationDefault02">de:</label>
          <input type="text" name="npagina" class="form-control" id="validationDefault02" value="">
        </div>
        <h1 style="display: flex; align-items: center; justify-content: center;">FORMATO KAIZEN</h1>
      </div>
      <div class="row justify-content-between">
        <div class="col-6 col-sm-4" style="color: black;">
          <label for="validationDefault02">Líder Kaizen:</label>
          <input type="text" name="lider" class="form-control" id="validationDefault02" value="">
        </div>
        <div class="col-6 col-sm-4">
          <label for="validationDefault02" style="color: black;">Fecha de término</label>
          <input type="date" name="fecha_termino" class="form-control" id="validationDefault02" value="">
        </div>
      </div>
      <div class="row justify-content-between">
        <div class="col-6 col-sm-4" style="color: black;">
          <label for="validationDefault01">Equipo Kaizen:</label>
          <input type="text" class="form-control" id="validationDefault01" name="equipo" value="">
        </div>
        <div class="col-6 col-sm-4">
          <label for="validationDefault02" style="color: black;">Compañía</label>
          <input type="text" name="compania" class="form-control" id="validationDefault02" value="">
        </div>
      </div>
      <div class="row justify-content-between">
        <div class="col-6 col-sm-4">
          <label for="validationDefault02" style="color: black;">Horas:</label>
          <input type="text" name="tiempo" class="form-control" id="validationDefault02" value="">
        </div>
        <div class="col-6 col-sm-4">
          <label for="validationDefault02" style="color: black;">Completado por:</label>
          <input type="text" name="completado" class="form-control" id="validationDefault02" value="">
        </div>
      </div><br>
      <div class="row justify-content-around">
        <div class="col-4">
          <label for="validationDefault01" style="color: black;">Antes Kaizen</label>
          <input type="file" accept="image/png, image/jpeg" class="form-control" id="uploadImage1" name="antes_kaizen" value="" onchange="previewImage(1);">
          <img id="uploadPreview1" style="position: absolute; margin-top: 5px;" width="400" height="250" />
        </div>
        <div class="col-4">
          <label for="validationDefault02" style="color: black;">Después Kaizen</label>
          <input class="form-control" type="file" accept="image/png, image/jpeg" name="despues_kaizen" id="uploadImage2" value="" onchange="previewImage(2);">
          <img id="uploadPreview2" width="400" height="250" style="margin-top: 5px;"/>
        </div>
        <br>
      </div>
      <div class="row justify-content-between" style="margin-top:50px;">
        <div class="col-6">
          <label for="validationDefault02" style="color: black;">Describir el Problema:</label>
          <textarea name="desc_problema" class="form-control" rows="3"></textarea>
        </div>
        <div class="col-6">
          <label for="validationDefault02" style="color: black;">Describir Mejoras:</label>
          <textarea name="desc_mejoras" class="form-control" id="" cols="40" rows="3"></textarea>
        </div>
        <div class="d-none">
          <label for="validationDefault02" style="color: black;">Fecha de Creación</label>
          <?php $fcha = date("Y-m-d"); ?>
          <input type="date" name="fecha_creacion" class="form-control" id="validationDefault02" value="<?php echo $fcha; ?>" disabled>
        </div>
        <br>
        <div class="col-6">
          <label for="validationDefault02" style="color: black;">Beneficio obtenido:</label>
          <textarea name="beneficio" class="form-control" id="" cols="40" rows="3"></textarea>
        </div>
        <div class="col-6">
          <label for="validationDefault02" style="color: black;">Emite:</label>
          <input type="text" name="emite" class="form-control" id="validationDefault02" value="">
        </div>

        <div class="col text-center">
          <button class="btn btn-primary" type="submit">Guardar</button>
        </div>
    </form>
  </div>
</div>
</div>
<br />
<br />
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