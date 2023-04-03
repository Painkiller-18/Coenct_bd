<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Mail\NotifiacionGmail;

class MailController extends Controller
{
    public function email(Request $request)
    {

        $cambios = DB::select("SELECT op.nombre AS operacion, cal.nombre AS pieza, 
        FORMAT(fecha, 'dd MMM yyyy') AS fecha, ay.documento AS ayuda_visual
        FROM calendario AS cal, operaciones AS op, cambios AS cam, ayudasvisuales AS ay
        WHERE cal.id = cam.id_calendario AND cal.id_operacion = op.id 
        AND cal.id_ayuda_visual = ay.id AND (cam.fecha = DATEADD(DAY, 1, CONVERT(DATE,SYSDATETIME())) OR cam.fecha = DATEADD(DAY, 2, CONVERT(DATE,SYSDATETIME())))");
        
        if (!empty($cambios)){
            Mail::to('javiermartinez@amats.com.mx')->send(new NotifiacionGmail($cambios));
        }

        //
       
     }

}
