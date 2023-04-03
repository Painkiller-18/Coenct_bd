<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\calendario;
use DateTime;
use Illuminate\Support\Facades\DB;

class CalendarExtController extends Controller
{
    public function consulta(){
        $info1 = DB::table('operaciones')
        ->select('id','nombre')
        ->get();

        $info = DB::table('calendario')
       ->join('operaciones','operaciones.id', '=', 'calendario.id_operacion')
       ->select('calendario.id','calendario.id_operacion','calendario.nombre',
       'calendario.codigo_alm','calendario.codigo_sap','calendario.pieza_ok',
       'calendario.pieza_nok','calendario.vida_util',
       'calendario.id_kaizen','operaciones.nombre as operacion')
       ->get();

       $totalRows = Db::table('calendario')
        ->select(DB::raw('count(*) as total'))
        ->where('status', '1')
        ->first();

        /*$rowsGrouped = DB::table('calendario')
        ->select(DB::raw('count(id) as total'))
        ->groupBy('id_operacion')
        ->get();*/

        /*$rowsGrouped = DB::table('calendario')
        ->join('operaciones', 'calendario.id_operacion', '=', 'operaciones.id')
        ->select(DB::raw('COUNT(calendario.id) AS operaciones, operaciones.nombre'))
        ->groupBy('id_operacion', 'operacionens.nombre');*/

        /*$operaciones = DB::table('calendario')
        ->select('*')
        ->orderBy('id_operacion', 'asc')
        ->orderBy('id', 'asc')
        ->get();*/

        /*$operaciones = DB::select('SELECT cal.id AS id, id_operacion, op.nombre AS nombre_operacion, cal.nombre AS nombre, codigo_alm, codigo_sap, pieza_ok, pieza_nok, vida_util, id_ayuda_visual, ay.nombre AS nombre_ayuda, id_kaizen, ka.nombre AS nombre_kaizen, fecha_historico, fecha_cambio, descripcion, cal.status AS status, aviso_lectura, cal.created_at AS created_at, cal.updated_at AS updated_at
        FROM calendario AS cal, operaciones AS op, kaizen AS ka, ayudasvisuales AS ay
        WHERE cal.id_operacion = op.id AND cal.id_kaizen = ka.id AND cal.id_ayuda_visual = ay.id
        ORDER BY id_operacion, cal.id');*/

        $operaciones = DB::select("SELECT cal.id AS id, id_operacion, op.nombre AS nombre_operacion, 
        cal.nombre AS nombre, codigo_alm, codigo_sap, pieza_ok, pieza_nok, 
        CASE vida_util 
        WHEN -1 
        THEN 'Semanal' 
        WHEN 1 
        THEN CONVERT(nvarchar, vida_util)+' mes' 
        ELSE CONVERT(nvarchar, vida_util)+' meses' 
        END AS vida_util, vida_util AS vida_comp,id_ayuda_visual, ay.nombre AS nombre_ayuda, 
        ay.documento AS documento_ayuda, id_kaizen, 
        ka.nombre AS nombre_kaizen, ka.documento AS documento_kaizen, cal.status AS status 
        FROM calendario AS cal, operaciones AS op, kaizen AS ka, ayudasvisuales AS ay
        WHERE cal.id_operacion = op.id AND cal.id_kaizen = ka.id AND cal.id_ayuda_visual = ay.id AND cal.status = 1
        ORDER BY id_operacion, cal.id");

        $rowsGrouped = DB::select('SELECT COUNT(cal.id) AS operaciones, op.nombre 
        FROM calendario cal, operaciones op WHERE cal.id_operacion = op.id AND cal.status = 1
        GROUP BY id_operacion, op.nombre');

        $cambios = DB::table('cambios')
        ->select(DB::raw("id, id_calendario, status, 
        FORMAT(fecha, 'dd MMM yyyy') AS fecha, FORMAT(fecha, 'yyyy-MM-dd') AS fecha_comp, 
        comentarios, fecha AS fecha_order"))
        ->orderBy('id_calendario', 'asc')
        ->orderBy('fecha_order', 'asc')
        ->get();

        $user = DB::table('users')
        ->join('nivelacceso', 'nivelacceso.id', '=', 'users.id_nivelacceso')
        ->select('users.id','users.name','users.app','users.apm','users.nempleado','nivelacceso.nombre')
        ->whereIn('users.id_nivelacceso', [1, 2])
        ->get();

        $fecha_actual = strtotime(date("Y-m-d",time()));


        // dd($info);
       return view('calendario.view_calendar',[
            'info' => $info,
            'info1' => $info1,
            'rows' => $totalRows->total,
            'rowsGrouped' => $rowsGrouped,
            'operaciones' => $operaciones,
            'cambios' => $cambios,
            'user' => $user,
            'fecha_actual' => $fecha_actual,
            'aux' => date("Y-m-d",time())
       ]);
    }

    public function query(){
        $totalRows = DB::table('calendario')
        ->select(DB::raw('count(*) as total'))
        ->where('status', '1')
        ->first();
        return view('calendario.view_calendar', [
            'totalRows' => $totalRows->total
        ]);
    }
    
}
