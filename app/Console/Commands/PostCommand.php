<?php

namespace App\Console\Commands;
use Illuminate\Http\Request;
use Illuminate\Console\Command;
use App\Models\Notice;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use App\Notifications\SendNotification;
class PostCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:telegram';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Enviamos notificaciones de telegram';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(Request $request)
    {
        $fecha_actual = Carbon::now();
        $fecha_actual->addDays(1);
        $event = DB::table('calendario')
        ->join('ayudasvisuales', 'calendario.id_ayuda_visual', '=', 'ayudasvisuales.id')
        ->select('calendario.id','calendario.operacion','calendario.nombre','ayudasvisuales.documento','calendario.fecha_cambio')->where('fecha_cambio', '=', $fecha_actual)->get();
       // dd($fecha_actual);
        $url = storage_path('app/public/');
        foreach($event as $event){ 
            $notice = new Notice([
                'id'           =>$event->mid,
                'notice'       =>$event->operacion,
                'noticedes'    =>$event->nombre,
                'documento'    =>$url.($event->documento),
                'telegramid'   =>Config::get('services.chat_id')
              ]);
              $notice->save();
              $notice->notify(new SendNotification());
            } 
            if($event = $fecha_actual){
         $fecha_actual->addDays(1);
         $event = DB::table('calendario')
         ->join('ayudasvisuales', 'calendario.id_ayuda_visual', '=', 'ayudasvisuales.id')
         ->select('calendario.id','calendario.operacion','calendario.nombre','ayudasvisuales.documento','calendario.fecha_cambio')->where('fecha_cambio', '=', $fecha_actual)->get();
       // dd($fecha_actual);
        $url = storage_path('app/public/');
        foreach($event as $event){
            $notice = new Notice([
                'id'           =>$event->id,
                'notice'       =>$event->operacion,
                'noticedes'    =>$event->nombre,
                'documento'    =>$url.($event->documento),
                'telegramid'   =>Config::get('services.chat_id')
              ]);

              $notice->save();
              $notice->notify(new SendNotification());
            } 
      }
           
    }
}