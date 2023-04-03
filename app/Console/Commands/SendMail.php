<?php

namespace App\Console\Commands;

use App\Mail\NotifiacionGmail;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class SendMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'registered:mailsend';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Enviar un correo para el cambio de pieza';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $cambios = DB::select("SELECT op.nombre AS operacion, cal.nombre AS pieza, 
        FORMAT(fecha, 'dd MMM yyyy') AS fecha, ay.documento AS ayuda_visual
        FROM calendario AS cal, operaciones AS op, cambios AS cam, ayudasvisuales AS ay
        WHERE cal.id = cam.id_calendario AND cal.id_operacion = op.id 
        AND cal.id_ayuda_visual = ay.id AND (cam.fecha = DATEADD(DAY, 1, CONVERT(DATE,SYSDATETIME())) OR cam.fecha = DATEADD(DAY, 2, CONVERT(DATE,SYSDATETIME())))"); 
        if (!empty($cambios)){
            Mail::to('javiermartinez@amats.com.mx')->send(new NotifiacionGmail($cambios));
            Mail::to('oscar.roca@amats.com.mx')->send(new NotifiacionGmail($cambios));
        }
    }
}
