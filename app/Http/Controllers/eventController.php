<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\calendario;
use App\Models\Cambio;
use App\Models\User;
use App\Models\registrolectura;
use Carbon\Carbon;
use App\Models\Notice;
use Illuminate\Support\Facades\Config;
use Illuminate\Notifications\Notifiable;
use App\Notifications\SendNotification;
use Ramsey\Uuid\Uuid;
use File;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;

class eventController extends Controller
{
  //
  // formulario de evento
  public function form()
  {
    return view("calendario/evento/form");
  }

  // guardar evento
  public function create(Request $request)
  {

    // validacion
    $this->validate($request, [
      'nombre'     =>  'required',
      'descripcion'  =>  'required',
      'fecha_cambio' =>  'required'
    ]);

    // guarda la base de datos
    calendario::insert([
      'nombre'       => $request->input("nombre"),
      'descripcion'  => $request->input("descripcion"),
      'fecha_cambio' => $request->input("fecha_cambio")
    ]);

    // devuelve el mensaje de exito
    return back()->with('success', 'Enviado exitosamente!');
  }

  public function details($id)
  {

    // llamar evento por id

    $event = calendario::find($id);
    return view("calendario/index", [
      "event" => $event,
    ]);
  }

  public function imagen($id, Request $request)
  {
    $imagenOk = $request->file('pieza_ok');
    $imagenNoOk = $request->file('pieza_nok');
    if ($imagenOk != null) {
      // <===========================Guardar Imagen OK ======================================>
      $request->validate([
        'pieza_ok'=>['image']
      ]);
      $imagen = $request->file('pieza_ok')->getClientOriginalName();
      $nombre_imagen = pathinfo($imagen, PATHINFO_FILENAME);
      $extension_imagen = $request->file('pieza_ok')->getClientOriginalExtension();
      $nombre_a_guardar = $nombre_imagen . '_' . time() . '.' . $extension_imagen;
      $request->file('pieza_ok')->storeAs('public/Imgpieza', $nombre_a_guardar);
      $event = calendario::findorFail($id);
      $event->pieza_ok = $nombre_a_guardar;
      $event->save();
    }
    if ($imagenNoOk != null) {
      // <===========================Guardar Imagen NOK ======================================>
      $request->validate([
        'pieza_nok'=>['image']
      ]);
      $imagen = $request->file('pieza_nok')->getClientOriginalName();
      $nombre_imagen = pathinfo($imagen, PATHINFO_FILENAME);
      $extension_imagen = $request->file('pieza_nok')->getClientOriginalExtension();
      $nombre_a_guardar_1 = $nombre_imagen . '_' . time() . '.' . $extension_imagen;
      $request->file('pieza_nok')->storeAs('public/Imgpieza', $nombre_a_guardar_1);
      $event = calendario::findorFail($id);
      $event->pieza_nok = $nombre_a_guardar_1;
      $event->save();
    }
    return redirect()->action([CalendarExtController::class, 'consulta']);
  }

  public function pospuesto($id, Request $request)
  {
    $emple = $request->nemple;
    if ($emple == null) {
      Alert::info('Usuario incorrecto', 'Se debe seleccionar un administrador');
      return back();
    }
    $password = $request->input('pass');
    $user = User::where('nempleado', '=', $emple)->first();
    if (!$user) {
      Alert::info('Usuario incorrecto', 'Se debe seleccionar un administrador');
      return back();
    }
    if (!Hash::check($password, $user->password)) {
      Alert::error(
        'Error',
        'El cambio no se pudo posponer debido a que el usuario o la contraseña son incorrectos.'
      );
      return back();
    }
    $cambio = Cambio::find($id);
    $cambio->status = 'Pospuesto';
    $cambio->comentarios = $request->descripcion;
    $cambio->id_usuario = $user->id;
    $cambio->actualizado = DB::raw('SYSDATETIME()');
    $cambio->save();
    Alert::success('Operación completada', 'El cambio ha sido pospuesto');
    return redirect()->action([CalendarExtController::class, 'consulta']);
  }

  /*public function posponer($id, Request $request){
         /*====================Cambio de Fecha Posponer==========================
         $fecha = $request->fecha_cambio;
         $currentDateTime = Carbon::parse($fecha);
           $newDateTime = $currentDateTime->addDays(1);
           $nempleado = $request->nempleado;
      $password = $request->input('password');
      
      /*=====================Update=========================
     
 
      $user = User::where('nempleado', '=', $nempleado)->first();
      if (!$user) {
      
       Alert::warning('Info', 'Se debe seleccionar un administrador');
       return back();
      }
      if (!Hash::check($password, $user->password)) {
         Alert::error('Error', 'Contraseña incorrecta');
             return back();
      }
         $event = calendario::findorFail($id);
         $event->fecha_cambio=$newDateTime;
         $event->descripcion=$request->descripcion;
         $event->aviso_lectura=$request->aviso_lectura;
         $event->save();
           Alert::success('Terminado', 'Evento pospuesto');
           return redirect()->action([calendarioController::class, 'index']);      
      }*/

  public function completado($id, Request $request)
  {
    $emple = $request->nemple;
    if ($emple == null) {
      Alert::info('Usuario incorrecto', 'Se debe seleccionar un administrador');
      return back();
    }
    $password = $request->input('pass');
    $user = User::where('nempleado', '=', $emple)->first();
    if (!$user) {
      Alert::info('Usuario incorrecto', 'Se debe seleccionar un administrador');
      return back();
    }
    if (!Hash::check($password, $user->password)) {
      Alert::error(
        'Error',
        'El cambio no se pudo completar debido a que el usuario o la contraseña son incorrectos.'
      );
      return back();
    }
    $cambio = Cambio::find($id);
    $cambio->status = 'Completado';
    $cambio->id_usuario = $user->id;
    $cambio->actualizado = DB::raw('SYSDATETIME()');
    $cambio->save();
    Alert::success('Completado', 'El cambio ha sido completado');
    return redirect()->action([CalendarExtController::class, 'consulta']);
    $aviso = $request->aviso_lectura;
    $visual = $request->id_ayuda_visual;
    if ($aviso == null) {
      return redirect()->action([calendarioController::class, 'index']);
    } else {
      $kaizen = new registrolectura;
      $kaizen->id_users = $aviso;
      $kaizen->id_ayudavisual = $visual;
      $kaizen->status = $request->status;
      $kaizen->save();
    }
  }

  /*public function terminado($id, Request $request){
        /*====================Cambio de Fecha Terminado==========================
        $fecha = $request->fecha_cambio;
        $meses = $request->vida_util;
        $currentDateTime = Carbon::parse($fecha);
        if($meses == true){
        $newDateTime = $currentDateTime->addMonths($meses);
        $emple = $request->nemple;
        $password = $request->input('pass');

     $user = User::where('nempleado', '=', $emple)->first();
     if (!$user) {
      Alert::info('Info', 'Se debe seleccionar un administrador');
      return back();
     }
     if (!Hash::check($password, $user->password)) {
      Alert::error('Error', 'Contraseña incorrecta');
      return back();
     }
        $event = calendario::findorFail($id);
        $event->vida_util=$request->vida_util;
        $event->fecha_cambio=$newDateTime;
        $event->aviso_lectura=$request->aviso_lectura;
        $event->save();
       
          Alert::success('Terminado', 'Evento completado');
          return redirect()->action([calendarioController::class, 'index']);
        }
        
        $aviso = $request->aviso_lectura;
        $visual = $request->id_ayuda_visual;

        if ($aviso == null){
          return redirect()->action([calendarioController::class, 'index']);

        } else{
          
        $kaizen = new registrolectura;
        $kaizen ->id_users = $aviso;
        $kaizen ->id_ayudavisual = $visual;
        $kaizen ->status=$request->status;
        $kaizen ->save();
        }

        
      }*/
  // ======================== CANDELARIO =================
  public function index()
  {

    $month = date("Y-m");
    //
    $data = $this->calendar_month($month);
    $mes = $data['month'];
    // obtener mes en espanol
    $mespanish = $this->spanish_month($mes);
    $mes = $data['month'];

    return view("calendario/evento/calendario", [
      'data' => $data,
      'mes' => $mes,
      'mespanish' => $mespanish
    ]);
  }

  public function index_month($month)
  {

    $data = $this->calendar_month($month);
    $mes = $data['month'];
    // obtener mes en espanol
    $mespanish = $this->spanish_month($mes);
    $mes = $data['month'];

    return view("calendario/evento/calendario", [
      'data' => $data,
      'mes' => $mes,
      'mespanish' => $mespanish
    ]);
  }
  public static function calendar_month($month)
  {
    //$mes = date("Y-m");
    $mes = $month;
    //sacar el ultimo de dia del mes
    $daylast =  date("Y-m-d", strtotime("last day of " . $mes));
    //sacar el dia de dia del mes
    $fecha      =  date("Y-m-d", strtotime("first day of " . $mes));
    $daysmonth  =  date("d", strtotime($fecha));
    $montmonth  =  date("m", strtotime($fecha));
    $yearmonth  =  date("Y", strtotime($fecha));
    // sacar el lunes de la primera semana
    $nuevaFecha = mktime(0, 0, 0, $montmonth, $daysmonth, $yearmonth);
    $diaDeLaSemana = date("w", $nuevaFecha);
    $nuevaFecha = $nuevaFecha - ($diaDeLaSemana * 24 * 3600); //Restar los segundos totales de los dias transcurridos de la semana
    $dateini = date("Y-m-d", $nuevaFecha);
    //$dateini = date("Y-m-d",strtotime($dateini."+ 1 day"));
    // numero de primer semana del mes
    $semana1 = date("W", strtotime($fecha));
    // numero de ultima semana del mes
    $semana2 = date("W", strtotime($daylast));
    // semana todal del mes
    // en caso si es diciembre
    if (date("m", strtotime($mes)) == 12) {
      $semana = 5;
    } else {
      $semana = ($semana2 - $semana1) + 1;
    }
    // semana todal del mes
    $datafecha = $dateini;
    $calendario = array();
    $iweek = 0;
    while ($iweek < $semana) :
      $iweek++;
      //echo "Semana $iweek <br>";
      //
      $weekdata = [];
      for ($iday = 0; $iday < 7; $iday++) {
        // code...
        $datafecha = date("Y-m-d", strtotime($datafecha . "+ 1 day"));
        $datanew['mes'] = date("M", strtotime($datafecha));
        $datanew['dia'] = date("d", strtotime($datafecha));
        $datanew['fecha'] = $datafecha;
        //AGREGAR CONSULTAS EVENTO           // consulta evento y filtra por fecha
        $datanew['evento'] = calendario::where("fecha_cambio", $datafecha)->get();
        array_push($weekdata, $datanew);
      }
      $dataweek['semana'] = $iweek;
      $dataweek['datos'] = $weekdata;
      //$datafecha['horario'] = $datahorario;
      array_push($calendario, $dataweek);
    endwhile;
    $nextmonth = date("Y-M", strtotime($mes . "+ 1 month"));
    $lastmonth = date("Y-M", strtotime($mes . "- 1 month"));
    $month = date("M", strtotime($mes));
    $yearmonth = date("Y", strtotime($mes));
    //$month = date("M",strtotime("2019-03"));
    $data = array(
      'next' => $nextmonth,
      'month' => $month,
      'year' => $yearmonth,
      'last' => $lastmonth,
      'calendar' => $calendario,
    );
    return $data;
  }
  public static function spanish_month($month)
  {

    $mes = $month;
    if ($month == "Jan") {
      $mes = "Enero";
    } elseif ($month == "Feb") {
      $mes = "Febrero";
    } elseif ($month == "Mar") {
      $mes = "Marzo";
    } elseif ($month == "Apr") {
      $mes = "Abril";
    } elseif ($month == "May") {
      $mes = "Mayo";
    } elseif ($month == "Jun") {
      $mes = "Junio";
    } elseif ($month == "Jul") {
      $mes = "Julio";
    } elseif ($month == "Aug") {
      $mes = "Agosto";
    } elseif ($month == "Sep") {
      $mes = "Septiembre";
    } elseif ($month == "Oct") {
      $mes = "Octubre";
    } elseif ($month == "Oct") {
      $mes = "December";
    } elseif ($month == "Dec") {
      $mes = "Diciembre";
    } else {
      $mes = $month;
    }
    return $mes;
  }
}
