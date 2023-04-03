<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\nivelacceso;
use App\Models\calendario;
use App\Models\kaizen;
use App\Models\operaciones;
use App\Models\ayudasvisuales;
use Illuminate\Http\Request;
use DB;

class calendarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = DB::table('users')
        ->join('nivelacceso', 'nivelacceso.id', '=', 'users.id_nivelacceso')
        ->select('users.id','users.name','users.app','users.apm','users.nempleado','nivelacceso.nombre')
        ->whereIn('users.id_nivelacceso', [1, 2])
        ->get();
               

      $month = date("Y-m");
      //
      $data = $this->calendar_month($month);
      $mes = $data['month'];
      // obtener mes en espanol
      $mespanish = $this->spanish_month($mes);
      $mes = $data['month'];
      return view("calendario/index",[
        'data' => $data,
        'user' => $user,
        'mes' => $mes,
        'mespanish' => $mespanish,
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index_month($month){ 
      $user = DB::table('users')
        ->join('nivelacceso', 'nivelacceso.id', '=', 'users.id_nivelacceso')
        ->select('users.id','users.name','users.app','users.apm','users.nempleado','nivelacceso.nombre')
        ->whereIn('users.id_nivelacceso', [1, 2])
        ->get();

        $data = $this->calendar_month($month);
        $mes = $data['month'];
        // obtener mes en espanol
        $mespanish = $this->spanish_month($mes);
        $mes = $data['month'];
   
        return view("calendario/index",[
          'data' => $data,
          'user' => $user,
          'mes' => $mes,
          'mespanish' => $mespanish
        ]);
   
      }
   
      public static function calendar_month($month){
        //$mes = date("Y-m");
        $mes = $month;
        //sacar el ultimo de dia del mes
        $daylast =  date("Y-m-d", strtotime("last day of ".$mes));
        //sacar el dia de dia del mes
        $fecha      =  date("Y-m-d", strtotime("first day of ".$mes));
        $daysmonth  =  date("d", strtotime($fecha));
        $montmonth  =  date("m", strtotime($fecha));
        $yearmonth  =  date("Y", strtotime($fecha));
        // sacar el lunes de la primera semana
        $nuevaFecha = mktime(0,0,0,$montmonth,$daysmonth,$yearmonth);
        $diaDeLaSemana = date("w", $nuevaFecha);
        $nuevaFecha = $nuevaFecha - ($diaDeLaSemana*24*3600); //Restar los segundos totales de los dias transcurridos de la semana
        $dateini = date ("Y-m-d",$nuevaFecha);
        //$dateini = date("Y-m-d",strtotime($dateini."+ 1 day"));
        // numero de primer semana del mes
        $semana1 = date("W",strtotime($fecha));
        // numero de ultima semana del mes
        $semana2 = date("W",strtotime($daylast));
        // semana todal del mes
        // en caso si es diciembre
        if (date("m", strtotime($mes))==12) {
            $semana = 5;
        }
        else {
          $semana = ($semana2-$semana1)+1;
        }
        if (date("m", strtotime($mes))==1) {
            $semana = 5;
        }
        else {
          $semana = ($semana2-$semana1)+1;
        }

        // semana todal del mes
        $datafecha = $dateini;
        $calendario = array();
        $iweek = 0;
        while ($iweek < $semana):
            $iweek++;
            //echo "Semana $iweek <br>";
            //
            $weekdata = [];
            for ($iday=0; $iday < 7 ; $iday++){
              // code...
              $datafecha = date("Y-m-d",strtotime($datafecha."+ 1 day"));
              $datanew['mes'] = date("M", strtotime($datafecha));
              $datanew['dia'] = date("d", strtotime($datafecha));
              $datanew['fecha'] = $datafecha;
              //AGREGAR CONSULTAS EVENTO
              //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
              $datanew['evento'] = DB::table('calendario')
              ->join('kaizen','calendario.id_kaizen', '=', 'kaizen.id')
              ->join('operaciones','calendario.id_operacion', '=', 'operaciones.id')
              ->join('ayudasvisuales','calendario.id_ayuda_visual', '=', 'ayudasvisuales.id')
              ->select(DB::raw("calendario.id, calendario.id_operacion, operaciones.nombre as ope_name, calendario.nombre, calendario.codigo_alm, calendario.codigo_sap, calendario.pieza_ok, calendario.pieza_nok, 
              CASE calendario.vida_util WHEN -1 
              THEN 'Semanal' 
              WHEN 1 
              THEN CONVERT(nvarchar, calendario.vida_util)+' mes' 
              ELSE CONVERT(nvarchar, calendario.vida_util)+' meses' 
              END AS vida_util, calendario.id_ayuda_visual, calendario.id_kaizen, kaizen.nombre as kainombre, calendario.status, calendario.fecha_historico, calendario.fecha_cambio, calendario.descripcion, calendario.aviso_lectura, ayudasvisuales.documento as ayudadocumento"))
              ->where("fecha_cambio",$datafecha)->get();
              //->orWhere("fecha_cambio",$datafecha)->get();
              array_push($weekdata,$datanew);
            
            }
            $dataweek['semana'] = $iweek;
            $dataweek['datos'] = $weekdata;
            //$datafecha['horario'] = $datahorario;
            array_push($calendario,$dataweek);
        endwhile;
        $nextmonth = date("Y-M",strtotime($mes."+ 1 month"));
        $lastmonth = date("Y-M",strtotime($mes."- 1 month"));
        $month = date("M",strtotime($mes));
        $yearmonth = date("Y",strtotime($mes));
        //$month = date("M",strtotime("2019-03"));
        $data = array(
          'next' => $nextmonth,
          'month'=> $month,
          'year' => $yearmonth,
          'last' => $lastmonth,
          'calendar' => $calendario,
        );
        return $data;
      }
   
      public static function spanish_month($month)
      {
   
          $mes = $month;
          if ($month=="Jan") {
            $mes = "Enero";
          }
          elseif ($month=="Feb")  {
            $mes = "Febrero";
          }
          elseif ($month=="Mar")  {
            $mes = "Marzo";
          }
          elseif ($month=="Apr") {
            $mes = "Abril";
          }
          elseif ($month=="May") {
            $mes = "Mayo";
          }
          elseif ($month=="Jun") {
            $mes = "Junio";
          }
          elseif ($month=="Jul") {
            $mes = "Julio";
          }
          elseif ($month=="Aug") {
            $mes = "Agosto";
          }
          elseif ($month=="Sep") {
            $mes = "Septiembre";
          }
          elseif ($month=="Oct") {
            $mes = "Octubre";
          }
          elseif ($month=="Nov") {
            $mes = "Noviembre";
          }
          elseif ($month=="Dec") {
            $mes = "Diciembre";
          }
          else {
            $mes = $month;
          }
          return $mes;
      }

    public function create()
    {
        return view('calendario.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $datos = $request->all();
        calendario::create($datos);
        return redirect('/calendario');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $calendario = DB::table('calendario')
        ->find($id)
        ->join('kaizen','calendario.id_kaizen', '=', 'kaizen.id')
        ->select('kaizen.documento')
        -get();
        return view('calendario/index')->with('calendario',$calendario);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $calendario = calendario::find($id);
        return view('calendario.edit')->with('calendario', $calendario);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datos = $request->all();
        $calendario = calendario::find($id);
        $calendario->update($datos);
        return redirect('/calendario');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $calendario = calendario::find($id);
        $calendario->status = 0;
        $calendario->save();

        return redirect('/calendario');
    }

    public function example(){
      $ope = DB::table('operaciones')
      ->pluck('id');

      $newcalendar = DB::table('calendario')
      ->pluck('id_operacion');
      
      if($ope[0] == $newcalendar[0]){
        $new = DB::table('calendario')
        ->join('kaizen','calendario.id_kaizen', '=', 'kaizen.id')
        ->join('operaciones','calendario.id_operacion', '=', 'operaciones.id')->select('calendario.id','calendario.id_operacion','calendario.nombre','calendario.codigo_alm','calendario.pieza_ok','calendario.pieza_nok','calendario.vida_util','calendario.id_kaizen','kaizen.nombre as kainombre','operaciones.nombre as operacion')->get();
       
        $ope = DB::table('operaciones')
      ->select('nombre')->get();
     //dd($new);
     
        return view("calendario.view_calendar",[
          'new' => $new,
          'ope' => $ope,
        ]);
      }else{

      }
    }
    
}
