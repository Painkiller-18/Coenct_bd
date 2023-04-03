<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    </head>
    <body>
        <h1>este es otro correo</h1>
<table class="table" style="border: 2px solid;">
    <tr style="text-align:center; border: 2px solid;">
        <th>Operación</th>
        <th>Pieza</th>
        <th>Fecha de cambio</th>
        <th>Ayuda Visual</th>
    </tr>
    @foreach ($mail2 as $mail2)
    <tr style="text-align:center; border: 2px solid;">
        <td style="text-align:center; border: 2px solid;">{{$mail2->operacion}}</td>
        <td style="text-align:center; border: 2px solid;">{{$mail2->nombre}}</td>
        <td style="text-align:center; border: 2px solid;">{{$mail2->fecha_cambio}}</td>
        <td style="text-align:center; border: 2px solid;">{{$mail2->id_ayuda_visual}}</td>
    </tr>
    @endforeach
  </table>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
    </body>
</html>
