<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    </head>
    <body>

    <h1>Buen día</h1>
    <p>Estos son los cambios pa' mañada y pasado mañana.</p>
    <br>
    <p><strong>¡Éxito!</strong></p>
        
<table class="table" style="border: 2px solid;">
    <tr style="text-align:center; border: 2px solid;">
        <th>Operación</th>
        <th>Pieza</th>
        <th>Fecha de cambio</th>
        <th>Ayuda Visual</th>
    </tr>
    @foreach ($cambios as $cambio)
    <tr style="text-align:center; border: 2px solid;">
        <td style="text-align:center; border: 2px solid;">{{$cambio->operacion}}</td>
        <td style="text-align:center; border: 2px solid;">{{$cambio->pieza}}</td>
        <td style="text-align:center; border: 2px solid;">{{$cambio->fecha}}</td>
        <td style="text-align:center; border: 2px solid;"><a href="{{ asset('/storage/public/ayudasvisuales/'.$cambio->ayuda_visual.'') }}">{{$cambio->ayuda_visual}}</a></td>
    </tr>
    @endforeach
  </table>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
    </body>
</html>
