<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notificación de pieza en stock mínimo</title>
</head>
<body>
    <h1>Buen día</h1>
    <h4>Pieza {{$pieza->nombre}}</h4>
    <p>La pieza {{$pieza->nombre}} se encuentra en stock mínimo o por debajo de su stock mínimo.</p>
    <h5>Se recomienda resurtir la pieza lo antes posible.</h5>
    <h4>Stock mínimo: {{$pieza->minimo}}</h4>
    <h3>Stock real: {{$pieza->stock}}</h3>
    <h2>Detalles de la pieza</h2>
    <table class="table" style="border: 2px solid;">
        <thead>
            <tr style="text-align:center; border: 2px solid;">
                <th>ID</th>
                <th>Pieza</th>
                <th>Cod. Almacenamiento</th>
                <th>Cod. SAP</th>
                <th>Stok Real</th>
                <th>Stok Mínimo</th>
                <th>Stock Máximo</th>
            </tr>
        </thead>
        <tbody>
            <tr style="text-align:center; border: 2px solid;">
                <td style="text-align:center; border: 2px solid;">{{$pieza->id}}</td>
                <td style="text-align:center; border: 2px solid; padding-left: 3px; padding-right: 3px;">{{$pieza->nombre}}</td>
                <td style="text-align:center; border: 2px solid;">{{$pieza->codigo_alm}}</td>
                <td style="text-align:center; border: 2px solid;">{{$pieza->codigo_sap}}</td>
                <td style="text-align:center; border: 2px solid;">{{$pieza->stock}}</td>
                <td style="text-align:center; border: 2px solid;">{{$pieza->maximo}}</td>
                <td style="text-align:center; border: 2px solid;">{{$pieza->minimo}}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>