<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>FORMATO KAIZEN</title>
    <!-- Bootstrap CSS -->
</head>
<style>
    .p1{
        text-align:left;
    }
    .p2{
        
        text-align:right;
    }
    
    h1.titulo{
       color:red;
        font-size: 25px;
        display:absolute;
        text-align:center;
        text-align:center;
    }

    .thr{
        width: 300px;
        border: 3px solid;
    }

    .obj{
        width: 400px;
        height: 250px;
        border: solid;
        color: black;
    }
    img{
        width: 400px;
        height: 250px;
    }

    .tab1{
        width: 900px;
        margin: 0 auto;
        margin-top:-50px;
    }
    .tab2{
        width: 900px;
        margin: 0 auto;
        margin-top:5px;
    }
    .tab3{
        width: 900px;
        margin: 0 auto;
        margin-top:5px;
        text-align:left;
    }
    .tab4{
        width: 900px;
        margin: 0 auto;
        margin-top:5px;
        text-align:left;
    }
    .left_tab{
        text-align:left;
    }

    .lg{
        width: 180%;

    }
    .sub{
        text-decoration: underline;
    }

</style>
<body>
    <div class="container">
            <table class="tab1">
                <tr>
                    <th style="position: absolute;">
                        <p class="p1">
                        Area de Mejora:&nbsp;<u class="sub">{{$area}}</u><br />  
                        Lider kaizen:&nbsp;<u class="sub">{{$lider}}</u><br />  
                        Equipo kaizen: <br>
                        <u class="sub">{{$equipo}}</u><br />  
                        Tiempo invertido:&nbsp;<u class="sub">Hrs.{{$tiempo}}</u>&nbsp;<u class="sub">12hrs.</u><br />   
                        </p>
                    </th>
                    <th>
                        <h1 style="position: relative; left: 30px;">FORMATO KAIZEN</h1>
                    </th>
                    <th style="position: absolute;">
                    <p class="p2"> Pág.&nbsp;<u class="sub">{{$pagina}}</u> &nbsp;&nbsp; de&nbsp;&nbsp;<u class="sub">{{$npagina}}</u><br /> 
                     Compañia:&nbsp;<u class="sub">{{$compania}}</u> <br /> 
                     Fecha de termino:&nbsp; <u class="sub">{{$fecha_termino}}</u> <br /> 
                     Completado por:&nbsp; <u class="sub">{{$completado}} </u> <br />  
                     <span style="color:blue;"> Codigo de referencia:&nbsp;</span> <u class="sub"> </u> <br />
                   <span style="color:blue;">(Sistema: "Compartiendo Mejoras en TIP")</span></p>
                     
                    </th>
                </tr>
    
            </table>
            <table class="tab2">
                <tr class="thr">
                    <th class="thr">ANTES KAIZEN</th>
                    <th class="thr">DESPUES KAIZEN</th>
                </tr>
                <tr>
                    <th class="obj"><img src="{{ public_path('storage/public/kaizenImg/'.$antes_kaizen) }}"alt=""></th>
                    <th class="obj"><img src="{{ public_path('storage/public/kaizenImg/'.$despues_kaizen) }}" alt=""></th>
                </tr>
            </table>
            <table class="tab3">
                <tr class="thr">
                    <th class="" style="position: absolute; width: 50%;">Describir problema(s) / áreas(s) de necesidad de mejora</th>
                    <th class="" style="position: absolute; width: 50%;">Describir mejoras hechas y sus beneficios</th>
                </tr>
                <tr>
                    <th style="position: absolute; width: 50%;">
                        <p class="sub" style="text-justify: distribute;">{{$desc_problema}}</p>
                    </th>
                    <th style="position: absolute; width: 50%;">
                        <p class="sub" style="text-justify: distribute;">{{$desc_mejoras}}</p>
                    </th>
                </tr>
            </table>
            <table class="tab4">
                <tr>
                    <th style="position: absolute; width: 50%;">Beneficio obtenido: <u class="sub">{{$beneficio}}</u>
                    </th>
                    <th class="lg" style="position: absolute; width: 50%;">Emite: <u u class="sub"> {{$emite}}</u> <br />
                     <p style="font-size:12px; text-align:center;">Nombre/Fecha</p></th>
                </tr>
                <tr>
                    <th class=""></th>
                    <th class="" style="position: absolute; width: 50p%;">Aprueba: <u style="text-align:center;">Israel Gonzalez</u><br />
                     <p style="font-size:12px; text-align:center;">Nombre/Fecha</p></th>
                </tr>
            </table>            
    </div>
    </body>
</html>