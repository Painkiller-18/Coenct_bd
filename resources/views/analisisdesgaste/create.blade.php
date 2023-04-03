@extends('vistas.master')
@section('contenido_central')
<style>
    h1 {

        font-size: 30px;
        text-align: center;
    }

    table {
        width: 400px;
        background: white;
        border: black 2px solid;

    }

    .thr1 {
        width: 400px;
        border: black 2px solid;
        font-size: 15px;
    }

    .thr {
        width: auto;
        border: black 2px solid;
        font-size: 15px;
    }

    .thr2 {
        width: 30%;
        border: black 2px solid;
        font-size: 15px;
    }

    .thr3 {
        width: 250px;
        border: black 2px solid;
        font-size: 15px;
    }

    .obj {
        width: 400px;
        height: 250px;
        border: solid;
        color: black;
    }

    .tab1 {
        width: 100%;
        margin: 0 auto;
    }

    .left_tab {
        text-align: left;
    }

    .lg {
        width: 180%;

    }

    .destacado {
        background: #81D1FC;
        height: auto;
    }

    .borderColor {
        background: #eee;
        border: 2px solid transparent;
        -moz-border-image: -moz-linear-gradient(left, #3acfd5 0%, #3a4ed5 100%);
        -webkit-border-image: -webkit-linear-gradient(left, #3acfd5 0%, #3a4ed5 100%);
        border-image: linear-gradient(to right, #3acfd5 0%, #3a4ed5 100%);
        border-image-slice: 1;
    }
</style>
<a href="{!! asset('analisisdesgaste') !!}" style="margin-left: 2em; color:black;"><i class="fas fa-arrow-left"></i> Regresar</a>
<div class="container">
    <form action="{{ route('form.desgaste') }}" method="POST">
        <div class="row" style="margin: auto 0;">
            <div class="col-auto">
                <label for="validationDefault01">Nombre:</label>
                <input type="text" class="form-control" id="validationDefault01" name="nombre" value="" required>
            </div>
        </div>
        <br>
        @csrf
        <table class="tab1">
            <tr class="thr">
                <th class="destacado" colspan="5">
                    <h1>Análisis de Falla de línea</h1>
                </th>
            </tr>
            <tr class="thr">
                <th class="thr">Elaboró: <br />
                @Auth
                <input type="text" value="{{auth()->user()->name}} {{auth()->user()->app}} {{auth()->user()->apm}}" readonly class="form-control" style="width: 100%;">
                @endAuth
                </th>
                <th class="thr" rowspan="2">Plataforma (as)/cliente (s):<br><br>
                    <input type="text" name="plataforma" class="form-control" style="width: 100%;">
                </th>
                <th class="thr" rowspan="2">No de parte: <br><br>
                    <input type="text" name="nparte" class="form-control" style="width: 100%;">
                </th>
                <th class="">QI Necesario?<select name="qi" id="id_qi" class="form-select" aria-label="Default select example">
                        <option value="No" selected>No</option>
                        <option value="Si">Si</option>
                    </select>
                </th>
            </tr>
            <tr class="thr">
                <th class="thr">Fecha: <br />
                    <input type="date" name="fech_lab" class="form-control" style="width: 100%;" value="{{date('Y-m-d')}}">
                </th>
                <th class="thr"> Número de QI<input type="text" id="qi_1" name="nqi" value="N/A" class="form-control" style="width: 100%;" disabled></th>
            </tr>
            <tr class="thr">
                <th class="thr">¿Qué Pasó?<br /> <span>(Breve descripción del problema/falla)</span></th>
                <th class="thr" colspan="4"><input type="text" name="qpaso" class="form-control" style="width: 100%;"></th>
            </tr>
            <tr class="thr">
                <th class="thr">¿Cuándo Paso?<br /><span>(Fecha, hora)</span></th>
                <th class="thr" colspan="2"><input type="date" name="cpaso" class="form-control" style="width: 100%;"> </th>
                <th class="thr" colspan="2"><input type="time" name="time" class="form-control" style="width: 100%;">
                </th>
            </tr>
            <tr class="thr">
                <th class="thr">Dónde Pasó?<br /><span>(estación, línea)</span></th>
                <th class="thr" colspan="4"><input type="text" name="dpaso" class="form-control" style="width: 100%;"></th>
            </tr>
            <tr class="thr">
                <th class="thr">¿Quién Detectó?<br /><span>(estación, operador)</span></th>
                <th class="thr" colspan="4"><input type="text" name="qdetecto" class="form-control" style="width: 100%;"></th>
            </tr>
            <tr class="thr">
                <th class="thr" colspan="5">Cómo se detectó? <br />
                    <input type="text" name="c_detec" class="form-control" style="width: 100%;">
                </th>
            </tr>
            <tr class="thr">
                <th class="thr">¿Por qué es un defecto?</th>
                <th class="thr" colspan="4"><input type="text" name="pdefecto" class="form-control" style="width: 100%;"></th>
            </tr>
            <tr class="thr">
                <th class="thr" colspan="5">Qué fue lo que cambió para generar el defecto? <br />
                    <input type="text" name="gen_def" class="form-control" style="width: 100%;">
                </th>
            </tr>
            <tr class="thr">
                <th class="thr" colspan="5">¿Se respetó el estándar? Revisar proceso. (HTE, plan de ajuste, parámetros, etc.) (plan de ajuste). <br /><input type="text" name="estandar" class="form-control" style="width: 100%;"></th>
            </tr>

            <tr class="thr">
                <th class="thr" rowspan="2">¿Cuántas piezas se detectaron con el defecto?</th>
                <th class="thr" rowspan="2"><input type="text" name="npiezas" class="form-control" style="width: 100%;"></th>
                <th class="thr" rowspan="2">¿Falla repetitiva? <br />
                    ¿Qué se hizo en el evento anterior?"</th>
                <th class="thr" colspan="2"><input type="text" name="frepetitiva" class="form-control" style="width: 100%;"></th>
            </tr>

            <tr class="thr">

            </tr>
            <tr class="thr">
                <th class="thr" rowspan="">Entrevista con el operador involucrado. (donde se generó la falla)</th>
                <th class="thr" colspan="4"><input type="text" name="entrevista" class="form-control" style="width: 100%;"></th>
            </tr>
            <tr class="thr">
                <th class="thr" rowspan=""> Acción Inmediata de contención. ¿Cómo aseguramos que no se va a seguir generando SCRAP por la misma falla? </th>
                <th class="thr" style=" width: 20%;">Responsable.</th>
                <th class="thr" style=" width: 20%;">Fecha.</th>
                <th class="thr" colspan="2">Validó la implementación de las acciones. (Nombre y firma de Auditor de Calidad)</th>
            </tr>
            <tr class="thr">
                <th class="thr" rowspan=""><input type="text" name="act1" class="form-control" style="width: 100%;"></th>
                <th class="thr" rowspan=""><input type="text" name="resp1" class="form-control" style="width: 100%;"></th>
                <th class="thr" rowspan=""><input type="date" name="fech1" class="form-control" style="width: 100%;"></th>
                <th class="thr" colspan=""><input type="text" name="valido1" class="form-control" style="width: 100%;"></th>
            </tr>
            <tr class="thr">
                <th class="thr" rowspan=""><input type="text" name="act2" class="form-control" style="width: 100%;"></th>
                <th class="thr" rowspan=""><input type="text" name="resp2" class="form-control" style="width: 100%;"></th>
                <th class="thr" rowspan=""><input type="date" name="fech2" class="form-control" style="width: 100%;"></th>
                <th class="thr" colspan=""><input type="text" name="valido2" class="form-control" style="width: 100%;"></th>
            </tr>
            <tr class="thr">
                <th class="thr" rowspan=""><input type="text" name="act3" class="form-control" style="width: 100%;"></th>
                <th class="thr" rowspan=""><input type="text" name="resp3" class="form-control" style="width: 100%;"></th>
                <th class="thr" rowspan=""><input type="date" name="fech3" class="form-control" style="width: 100%;"></th>
                <th class="thr" colspan=""><input type="text" name="valido3" class="form-control" style="width: 100%;"></th>
            </tr>

        </table>
        <table class="tab1">
            <tr class="thr">
                <th class="thr2" style="text-align:center;">Cantidad de piezas producidas hasta el momento de la falla (colocar cantidad) 350 MOTORES</th>
                <th class="thr3" style="text-align:center;">Piezas inspeccionadas </th>
                <th class="thr3" style="text-align:center;">Piezas NOK</th>
            </tr>

            <tr class="thr">
                <th class="thr" style="text-align:center;">Supermercado / rack de materiales:</th>
                <th class="thr" rowspan=""><input type="number" name="spz_insp" class="monto form-control" id="validationDefault02" onchange="sumarPins();" /></th>
                <th class="thr" rowspan=""><input type="number" name="spz_pznok" class="sum1 form-control" id="validationDefault02" onchange="sumarPnok();" /></th>

            </tr>
            <tr class="thr">
                <th class="thr" style="text-align:center;">Línea</th>
                <th class="thr" rowspan=""><input type="number" name="lpz_insp" class="monto form-control" id="validationDefault02" onchange="sumarPins();" /></th>
                <th class="thr" rowspan=""><input type="number" name="lpz_pznok" class="sum1 form-control" id="validationDefault02" onchange="sumarPnok();" /></th>

            </tr>
            <tr class="thr">
                <th class="thr" style="text-align:center;">Producto terminado</th>
                <th class="thr" rowspan=""><input type="number" name="ppz_insp" class="monto form-control" id="validationDefault02" onchange="sumarPins();" /></th>
                <th class="thr" rowspan=""><input type="number" name="ppz_pznok" class="sum1 form-control" id="validationDefault02" onchange="sumarPnok();" /></th>

            </tr>
            <tr class="thr">
                <th class="thr" style="text-align:center;">Cliente</th>
                <th class="thr" rowspan=""><input type="number" name="cpz_insp" class="monto form-control" id="validationDefault02" onchange="sumarPins();" /></th>
                <th class="thr" rowspan=""><input type="number" name="cpz_pznok" class="sum1 form-control" id="validationDefault02" onchange="sumarPnok();" /></th>

            </tr>
            <tr class="thr">
                <th class="thr" style="text-align:center;">Total</th>
                <th class="thr" rowspan=""><input type="number" name="tpz_insp" class="form-control" id="totalPins" value="0" readonly /></th>
                <th class="thr" rowspan=""><input type="number" name="tpz_pznok" class="form-control" id="totalPnok" value="0" readonly /></th>

            </tr>
        </table>
        <table class="tab1">
            <tr>
                <th class="thr destacado" colspan="5" style="text-align:center;">Análisis de Causas:</th>
            </tr>
            <tr class="thr">
                <th class="thr" rowspan="">Cuál es el factor a atacar? (método, mano de obra, máquina, material, medio ambiente)</th>
                <th class="thr" colspan="5">Problema:<br />
                    <input type="text" name="problema" class="form-control" style="width: 100%;">
                </th>
            </tr>
            <tr class="thr">
                <th class="thr" rowspan="">Porqué?</th>
                <th class="thr" colspan="5"><input type="text" name="causa1" class="form-control" style="width: 100%;"></th>
            </tr>
            <tr class="thr">
                <th class="thr" rowspan="">Porqué?</th>
                <th class="thr" colspan="5"><input type="text" name="causa2" class="form-control" style="width: 100%;"></th>
            </tr>
            <tr class="thr">
                <th class="thr" rowspan="">Porqué?</th>
                <th class="thr" colspan="5"><input type="text" name="causa3" class="form-control" style="width: 100%;"></th>
            </tr>
            <tr class="thr">
                <th class="thr" rowspan="">Porqué?</th>
                <th class="thr" colspan="5"><input type="text" name="causa4" class="form-control" style="width: 100%;"></th>
            </tr>
            <tr class="thr">
                <th class="thr" rowspan="">Porqué?</th>
                <th class="thr" colspan="5"><input type="text" name="causa5" class="form-control" style="width: 100%;"></th>
            </tr>
            <tr class="thr">
                <th class="thr" colspan="5" style="text-align:center;">Sección para llenar por ajustador con ayuda de áreas de soporte.(Ingeniero de procesos, Calidad, Mantenimiento, etc.)</th>
            </tr>
            <tr class="thr">
                <th class="thr" style="text-align:center;">Acciones para corregir el problema</th>
                <th class="thr" style="text-align:center;">Quién?</th>
                <th class="thr" style="text-align:center;">Cuándo?</th>
                <th class="thr" style="text-align:center;">Estatus</th>
                <th class="thr" style="text-align:center;">Validó la efectividad:Cliente en proceso (Ajustador, Operador, Supervisor, Auditor)</th>
            </tr>
            <tr class="thr">
                <th class="thr" rowspan=""><input type="text" name="acc_pro_1" class="form-control" style="width: 100%;"></th>
                <th class="thr" rowspan=""><input type="text" name="qui_1" class="form-control" style="width: 100%;"></th>
                <th class="thr" rowspan=""><input type="text" name="cuand_1" class="form-control" style="width: 100%;"></th>
                <th class="thr" rowspan="">
                    <select name="status_1" id="" class="form-select" aria-label="Default select example">
                        <option value="0" selected>Selecciona una opción</option>
                        <option value="P">P</option>
                        <option value="D">D</option>
                        <option value="C">C</option>
                        <option value="A">A</option>
                    </select>
                </th>
                <th class="thr" rowspan=""><input type="text" name="valido_1" class="form-control" style="width: 100%;"></th>
            </tr>
            <tr class="thr">
                <th class="thr" rowspan=""><input type="text" name="acc_pro_2" class="form-control" style="width: 100%;"></th>
                <th class="thr" rowspan=""><input type="text" name="qui_2" class="form-control" style="width: 100%;"></th>
                <th class="thr" rowspan=""><input type="text" name="cuand_2" class="form-control" style="width: 100%;"></th>
                <th class="thr" rowspan="">
                    <select name="status_2" id="" class="form-select" aria-label="Default select example">
                        <option value="0" selected>Selecciona una opción</option>
                        <option value="P">P</option>
                        <option value="D">D</option>
                        <option value="C">C</option>
                        <option value="A">A</option>
                    </select>
                </th>
                </th>
                <th class="thr" rowspan=""><input type="text" name="valido_2" class="form-control" style="width: 100%;"></th>
            </tr>
            <tr class="thr">
                <th class="thr" rowspan=""><input type="text" name="acc_pro_3" class="form-control" style="width: 100%;"></th>
                <th class="thr" rowspan=""><input type="text" name="qui_3" class="form-control" style="width: 100%;"></th>
                <th class="thr" rowspan=""><input type="text" name="cuand_3" class="form-control" style="width: 100%;"></th>
                <th class="thr" rowspan="">
                    <select name="status_3" id="" class="form-select" aria-label="Default select example">
                        <option value="0" selected>Selecciona una opción</option>
                        <option value="P">P</option>
                        <option value="D">D</option>
                        <option value="C">C</option>
                        <option value="A">A</option>
                    </select>
                </th>
                </th>
                <th class="thr" rowspan=""><input type="text" name="valido_3" class="form-control" style="width: 100%;"></th>
            </tr>
            <tr class="thr">
                <th class="thr" rowspan=""><input type="text" name="acc_pro_4" class="form-control" style="width: 100%;"></th>
                <th class="thr" rowspan=""><input type="text" name="qui_4" class="form-control" style="width: 100%;"></th>
                <th class="thr" rowspan=""><input type="text" name="cuand_4" class="form-control" style="width: 100%;"></th>
                <th class="thr" rowspan="">
                    <select name="status_4" id="" class="form-select" aria-label="Default select example">
                        <option value="0" selected>Selecciona una opción</option>
                        <option value="P">P</option>
                        <option value="D">D</option>
                        <option value="C">C</option>
                        <option value="A">A</option>
                    </select>
                </th>
                <th class="thr" rowspan=""><input type="text" name="valido_4" class="form-control" style="width: 100%;"></th>
            </tr>
            <tr class="thr">
                <th class="thr" rowspan=""><input type="text" name="acc_pro_5" class="form-control" style="width: 100%;"></th>
                <th class="thr" rowspan=""><input type="text" name="qui_5" class="form-control" style="width: 100%;"></th>
                <th class="thr" rowspan=""><input type="text" name="cuand_5" class="form-control" style="width: 100%;"></th>
                <th class="thr" rowspan="">
                    <select name="status_5" id="" class="form-select" aria-label="Default select example">
                        <option value="0" selected>Selecciona una opción</option>
                        <option value="P">P</option>
                        <option value="D">D</option>
                        <option value="C">C</option>
                        <option value="A">A</option>
                    </select>
                </th>
                <th class="thr" rowspan=""><input type="text" name="valido_5" class="form-control" style="width: 100%;"></th>
            </tr>
        </table>

        <button class="btn btn-primary" type="submit">Submit form</button>
    </form>
</div>
</div>
@endsection()
@section('scripts')
<script>
    function sumarPins() {
        const $total = document.getElementById('totalPins');
        let subtotal = 0;
        [...document.getElementsByClassName("monto")].forEach(function(element) {
            if (element.value !== '') {
                subtotal += parseFloat(element.value);
            }
        });
        $total.value = subtotal;
    }

    function sumarPnok() {
        const $total1 = document.getElementById('totalPnok');
        let subtotal1 = 0;
        [...document.getElementsByClassName("sum1")].forEach(function(element) {
            if (element.value !== '') {
                subtotal1 += parseFloat(element.value);
            }
        });
        $total1.value = subtotal1;
    }
    $(document).ready(function() {
        $('#id_qi').change(function(e) {
            if ($(this).val() === "No") {
                $('#qi_1').prop("disabled", true);
                document.getElementById("qi_1").value = "N/A";
            } else {
                $('#qi_1').prop("disabled", false);
                document.getElementById("qi_1").value = "";
            }
        })
    });

    function cambiaImagen() {

        document.getElementById('pdca').src = "{{ asset('pic/1.png') }}";
    }

    function cambiaImagen1() {
        document.getElementById('pdca1').src = "{{ asset('pic/1.png') }}";
    }

    function cambiaImagen2() {
        document.getElementById('pdca2').src = "{{ asset('pic/2.png') }}";
    }

    function cambiaImagen3() {
        document.getElementById('pdca3').src = "{{ asset('pic/3.png') }}";
    }

    function cambiaImagen4() {
        document.getElementById('pdca4').src = "{{ asset('pic/4.png') }}";

    }
</script>
@endsection()