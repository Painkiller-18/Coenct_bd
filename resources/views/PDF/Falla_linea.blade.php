<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>FORMATO FALLA</title>
    <!-- Bootstrap CSS -->
</head>
<style>
    h1{
       
        font-size: 18px;
        text-align:center;
    }

    table{
        width: 400px;
        border: black 2px solid;

    }

    .thr1{
        width: 400px;
        border: black 2px solid;
    }
    .thr{
        width: 100%;
        border: black 2px solid;
        font-size:10px;
    }

    .obj{
        width: 400px;
        height: 250px;
        border: solid;
        color: black;

    }

    .tab1{
        width: 100%;
        margin: 0 auto;
    }
    .left_tab{
        text-align:left;
    }

    .lg{
        width: 180%;

    }
    .destacado{
        background: #3E87C7;
    }

</style>
<body>
    <div class="container">
            <table class="tab1">
                <tr class="thr">
                    <th class="destacado" colspan="5"><h1>Analisis de Falla de Linea</h1><img src="{{ public_path('pic/Imagen.bosch.png') }}" alt=""  width="110px" he style="margin: -22px -57em 0 0;">
                </th>
                    
                </tr>

                <tr class="thr">
                    <th class="thr">Elaboró:<p>{{$elaboro}}</p></th>
                    <th class="thr" rowspan="2">Plataforma (as)/cliente (s):<br>
                    {{$plataforma}}
                </th>
                    <th class="thr" rowspan="2">No de parte: <br /> {{$nparte}}</th>
                    <th class="thr"><p>QI Necesario? {{$qi}}</p></th>
                </tr>
                <tr class="thr">
                    <th class="thr">Fecha: {{$fech_lab}}</th>
                    
                    <th class="thr"><p> Número de QI : {{$nqi}}</p></th>
                </tr>
                <tr class="thr">
                    <th class="thr">¿Qué Pasó?<br /> <span>(Breve descripción del problema/falla)</span></th>
                    <th class="thr" colspan="4"><p>{{$qpaso}}</p></th>
                </tr>
                <tr class="thr">
                    <th class="thr">¿Cuándo Paso?<br /><span>(Fecha, hora)</span></th>
                    <th class="thr" colspan="4"><p>{{$cpaso}} | {{$time}}</p></th>
                </tr>
                <tr class="thr">
                    <th class="thr">Dónde Pasó?<br /><span>(estación, línea)</span></th>
                    <th class="thr" colspan="4"><p>{{$dpaso}}</p></th>
                </tr>
                <tr class="thr">
                    <th class="thr">¿Quién Detectó?<br /><span>(estación, operador)</span></th>
                    <th class="thr" colspan="4"><p>{{$qdetecto}}</p></th>
                </tr>
                <tr class="thr">
                    <th class="thr">Cómo se detectó? </th>
                    <th class="thr" colspan="4"><p>{{$c_detec}}</p></th>
                </tr>
                <tr class="thr">
                    <th class="thr">¿Por qué es un defecto?</th>
                    <th class="thr" colspan="4"><p>{{$pdefecto}}</p></th>
                </tr>
                <tr class="thr">
                    <th class="thr">Qué fue lo que cambió para generar el defecto?</th>
                    <th class="thr" colspan="4"><p>{{$gen_def}}</p></th>
                </tr>
                <tr class="thr">
                    <th class="thr" colspan="5">¿Se respetó el estándar? Revisar proceso. (HTE, plan de ajuste, parámetros, etc.) (plan de ajuste). <br> {{$estandar}}</th>
                </tr>
                
                <tr class="thr">
                    <th class="thr" rowspan="2">¿Cuántas piezas se detectaron con el defecto?</th>
                    <th class="thr" rowspan="2"><p>{{$npiezas}}</p></th>
                    <th class="thr" rowspan="2">¿Falla repetitiva? <br />
                    ¿Qué se hizo en el evento anterior?"</th>
                    <th class="thr" rowspan="2"><p>{{$frepetitiva}}</p></th>
                </tr>
               
                <tr class="thr">
                    
                </tr>
                <tr class="thr">
                    <th class="thr" rowspan="">Entrevista con el operador involucrado. (donde se generó la falla)</th>
                    <th class="thr" colspan="4"><p>{{$entrevista}}</p></th>
                </tr>
                <tr class="thr">
                    <th class="thr" rowspan="">	Acción Inmediata de contención. ¿Cómo aseguramos que no se va a seguir generando SCRAP por la misma falla? </th>
                    <th class="thr"  style=" width: 20%;">Responsable.</th>
                    <th class="thr" style=" width: 20%;">Fecha.</th>
                    <th class="thr" colspan="2">Validó la implementación de las acciones. (Nombre y firma de Auditor de Calidad)</th>
                </tr>
                <tr class="thr">
                    <th class="thr" rowspan=""><p>{{$act1}}</p></th>
                    <th class="thr" rowspan=""><p>{{$resp1}}</p></th>
                    <th class="thr" rowspan=""><p>{{$fech1}}</p></th>
                    <th class="thr" colspan=""><p>{{$valido1}}</p></th>
                </tr>
                <tr class="thr">
                    <th class="thr" rowspan=""><p>{{$act2}}</p></th>
                    <th class="thr" rowspan=""><p>{{$resp2}}</p></th>
                    <th class="thr" rowspan=""><p>{{$fech2}}</p></th>
                    <th class="thr" colspan=""><p>{{$valido2}}</p></th>
                </tr>
                <tr class="thr">
                    <th class="thr" rowspan=""><p>{{$act3}}</p></th>
                    <th class="thr" rowspan=""><p>{{$resp3}}</p></th>
                    <th class="thr" rowspan=""><p>{{$fech3}}</p></th>
                    <th class="thr" colspan=""><p>{{$valido3}}</p></th>
                </tr>
            </table>
            <table class="tab1">
            <tr class="thr">
                    <th class="thr" style="text-align:center;">Cantidad de piezas producidas hasta el momento de la falla  (colocar cantidad) ________</th>
                    <th class="thr" style="text-align:center;">Piezas inspeccionadas</th>
                    <th class="thr" style="text-align:center;">Piezas NOK</th>
                    <th class="thr" rowspan="6"><img src="{{ public_path('pic/desga.png') }}" alt=""  width="150px";></th>
                </tr>
                
            <tr class="thr">
                    <th class="thr" style="text-align:center;">Supermercado / rack de materiales:</th>
                    <th class="thr" rowspan=""><p>{{$spz_insp}}</p></th>
                    <th class="thr" rowspan=""><p>{{$spz_pznok}}</p></th>
                    
                </tr>
            <tr class="thr">
                    <th class="thr" style="text-align:center;">Línea</th>
                    <th class="thr" rowspan=""><p>{{$lpz_insp}}</p></th>
                    <th class="thr" rowspan=""><p>{{$lpz_pznok}}</p></th>
                    
                </tr>
            <tr class="thr">
                    <th class="thr" style="text-align:center;">Producto terminado</th>
                    <th class="thr" rowspan=""><p>{{$ppz_insp}}</p></th>
                    <th class="thr" rowspan=""><p>{{$ppz_pznok}}</p></th>
                   
                </tr>
            <tr class="thr">
                    <th class="thr" style="text-align:center;">Cliente</th>
                    <th class="thr" rowspan=""><p>{{$cpz_insp}}</p></th>
                    <th class="thr" rowspan=""><p>{{$cpz_pznok}}</p></th>
                    
                </tr>
            <tr class="thr">
                    <th class="thr" style="text-align:center;">Total</th>
                    <th class="thr" rowspan=""><p>{{$tpz_insp}}</p></th>
                    <th class="thr" rowspan=""><p>{{$tpz_pznok}}</p></th>
                    
                </tr>
            </table>
            <table class="tab1">
                <tr>
                <th class="thr destacado" colspan="5" style="text-align:center;">Análisis de Causas:</th>
                </tr>
            <tr class="thr">
                    <th class="thr" rowspan="">Cuál es el factor a atacar? (método, mano de obra, máquina, material, medio ambiente)</th>
                    <th class="thr" colspan="5">Problema: <br />
                    <p>{{$problema}}</p>
                  </th>
                </tr>
            <tr class="thr">
                    <th class="thr" rowspan="">¿Por qué?</th>
                    <th class="thr" colspan="5"><p>{{$causa1}}</p></th>
                </tr>
            <tr class="thr">
                    <th class="thr" rowspan="">¿Por qué?</th>
                    <th class="thr" colspan="5"><p>{{$causa2}}</p></th>
                </tr>
            <tr class="thr">
                    <th class="thr" rowspan="">¿Por qué?</th>
                    <th class="thr" colspan="5"><p>{{$causa3}}</p></th>
                </tr>
            <tr class="thr">
                    <th class="thr" rowspan="">¿Por qué?</th>
                    <th class="thr" colspan="5"><p>{{$causa4}}</p></th>
                </tr>
            <tr class="thr">
                    <th class="thr" rowspan="">¿Por qué?</th>
                    <th class="thr" colspan="5"><p>{{$causa5}}</p></th>
                </tr>
            <tr class="thr">
                    <th class="thr" colspan="5" style="text-align:center;">Sección para llenar por ajustador con ayuda de áreas de  soporte.(Ingeniero de procesos, Calidad, Mantenimiento, etc.)</th>
                </tr>
                <tr class="thr">
                    <th class="thr" style="text-align:center;">Acciones para corregir el problema</th>
                    <th class="thr" style="text-align:center;">¿Quien?</th>
                    <th class="thr" style="text-align:center;">¿Cuando?</th>
                    <th class="thr" style="text-align:center;">Estatus</th>
                    <th class="thr" style="text-align:center;">"Validó la efectividad:Cliente en proceso (Ajustador, Operador, Supervisor, Auditor)"</th>
                </tr>
                <tr class="thr">
                    <th class="thr" rowspan=""><p>{{$acc_pro_1}}</p></th>
                    <th class="thr" rowspan=""><p>{{$qui_1}}</p></th>
                    <th class="thr" rowspan=""><p>{{$cuand_1}}</p></th>
                    <th class="thr" rowspan="">
                    @switch($status_1)
        @case($status_1 == "P")
            <img src="{{ public_path('pic/1.png') }}" style="width:25%;" alt="P">
            @break
        @case($status_1 == "D")
            <img src="{{ public_path('pic/2.png') }}" style="width:25%;" alt="D">
            @break
        @case($status_1 == "C")
            <img src="{{ public_path('pic/3.png') }}" style="width:25%;" alt="C">
            @break
        @case($status_1 == "A")
            <img src="{{ public_path('pic/4.png') }}" style="width:25%;" alt="A">
            @break
        @case($status_1 == "A")
            <img src="{{ public_path('pic/4.png') }}" style="width:25%;" alt="A">
            @break
        @default
    @endswitch
                    </th>
                    <th class="thr" rowspan=""><p>{{$valido_1}}</p></th>
                    
                </tr>
                <tr class="thr">
                    <th class="thr" rowspan=""><p>{{$acc_pro_2}}</p></th>
                    <th class="thr" rowspan=""><p>{{$qui_2}}</p></th>
                    <th class="thr" rowspan=""><p>{{$cuand_2}}</p></th>
                    <th class="thr" rowspan="">
                    @switch($status_2)
        @case($status_2 == "P")
            <img src="{{ public_path('pic/1.png') }}" style="width:25%;" alt="P">
            @break
        @case($status_2 == "D")
            <img src="{{ public_path('pic/2.png') }}" style="width:25%;" alt="D">
            @break
        @case($status_2 == "C")
            <img src="{{ public_path('pic/3.png') }}" style="width:25%;" alt="C">
            @break
        @case($status_2 == "A")
            <img src="{{ public_path('pic/4.png') }}" style="width:25%;" alt="A">
            @break
        @case($status_2 == "A")
            <img src="{{ public_path('pic/4.png') }}" style="width:25%;" alt="A">
            @break
        @default
    @endswitch
                    </th>
                    <th class="thr" rowspan=""><p>{{$valido_2}}</p></th>
                    
                </tr>
                <tr class="thr">
                    <th class="thr" rowspan=""><p>{{$acc_pro_3}}</p></th>
                    <th class="thr" rowspan=""><p>{{$qui_3}}</p></th>
                    <th class="thr" rowspan=""><p>{{$cuand_3}}</p></th>
                    <th class="thr" rowspan="">
                    @switch($status_3)
        @case($status_3 == "P")
            <img src="{{ public_path('pic/1.png') }}" style="width:25%;" alt="P">
            @break
        @case($status_3 == "D")
            <img src="{{ public_path('pic/2.png') }}" style="width:25%;" alt="D">
            @break
        @case($status_3 == "C")
            <img src="{{ public_path('pic/3.png') }}" style="width:25%;" alt="C">
            @break
        @case($status_3 == "A")
            <img src="{{ public_path('pic/4.png') }}" style="width:25%;" alt="A">
            @break
        @case($status_3 == "A")
            <img src="{{ public_path('pic/4.png') }}" style="width:25%;" alt="A">
            @break
        @default
    @endswitch
                    </th>
                    <th class="thr" rowspan=""><p>{{$valido_3}}</p></th>
                    
                </tr>
                <tr class="thr">
                    <th class="thr" rowspan=""><p>{{$acc_pro_4}}</p></th>
                    <th class="thr" rowspan=""><p>{{$qui_4}}</p></th>
                    <th class="thr" rowspan=""><p>{{$cuand_4}}</p></th>
                    <th class="thr" rowspan="">
                    @switch($status_4)
        @case($status_4 == "P")
            <img src="{{ public_path('pic/1.png') }}" style="width:25%;" alt="P">
            @break
        @case($status_4 == "D")
            <img src="{{ public_path('pic/2.png') }}" style="width:25%;" alt="D">
            @break
        @case($status_4 == "C")
            <img src="{{ public_path('pic/3.png') }}" style="width:25%;" alt="C">
            @break
        @case($status_4 == "A")
            <img src="{{ public_path('pic/4.png') }}" style="width:25%;" alt="A">
            @break
        @case($status_4 == "A")
            <img src="{{ public_path('pic/4.png') }}" style="width:25%;" alt="A">
            @break
        @default
    @endswitch
                    </th>
                    <th class="thr" rowspan=""><p>{{$valido_4}}</p></th>
                    
                </tr>
                <tr class="thr">
                    <th class="thr" rowspan=""><p>{{$acc_pro_5}}</p></th>
                    <th class="thr" rowspan=""><p>{{$qui_5}}</p></th>
                    <th class="thr" rowspan=""><p>{{$cuand_5}}</p></th>
                    <th class="thr" rowspan="">
                    @switch($status_5)
        @case($status_5 == "P")
            <img src="{{ public_path('pic/1.png') }}" style="width:25%;" alt="P">
            @break
        @case($status_5 == "D")
            <img src="{{ public_path('pic/2.png') }}" style="width:25%;" alt="D">
            @break
        @case($status_5 == "C")
            <img src="{{ public_path('pic/3.png') }}" style="width:25%;" alt="C">
            @break
        @case($status_5 == "A")
            <img src="{{ public_path('pic/4.png') }}" style="width:25%;" alt="A">
            @break
        @case($status_5 == "A")
            <img src="{{ public_path('pic/4.png') }}" style="width:25%;" alt="A">
            @break
        @default
    @endswitch
                    </th>
                    <th class="thr" rowspan=""><p>{{$valido_5}}</p></th>
                    
                </tr>
                
            </table>
    </div>
    <script>
function segunda(var1){
document.getElementById(img5).value;
}
    </script>
</body>
</html>