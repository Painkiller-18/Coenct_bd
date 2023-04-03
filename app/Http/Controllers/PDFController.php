<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ayudasvisuales;
use App\Models\kaizen;
use App\Models\analisisdesgaste;
use PDF;
use File;
use Illuminate\Support\Facades\Storage;
use Dompdf\Dompdf;
use Dompdf\Options;
use Carbon\Carbon;

class PDFController extends Controller
{
    public function index(){
       return view('PDF.Falla_linea');
    }

    public function mostrar(Request $request){  

// <===========================Guardar Imagen======================================>

    $imagen = $request->file('antes_kaizen')->getClientOriginalName();
    $nombre_imagen = pathinfo($imagen,PATHINFO_FILENAME);
    $extension_imagen = $request->file('antes_kaizen')->getClientOriginalExtension();
    $nombre_a_guardar = $nombre_imagen.'_'.time().'.'.$extension_imagen;
    $request->file('antes_kaizen')->storeAs('public/kaizenImg',$nombre_a_guardar);

// <===========================Guardar Imagen 2======================================>

    $imagen = $request->file('despues_kaizen')->getClientOriginalName();
    $nombre_imagen = pathinfo($imagen,PATHINFO_FILENAME);
    $extension_imagen = $request->file('despues_kaizen')->getClientOriginalExtension();
    $nombre_a_guardar_1 = $nombre_imagen.'_'.time().'.'.$extension_imagen;
    $request->file('despues_kaizen')->storeAs('public/kaizenImg',$nombre_a_guardar_1);

// <===========================Rellenar Plantilla======================================>
        $data = [
        'area'=> $request->area,
        'lider'=>$request->lider,
        'equipo'=>$request->equipo,
        'tiempo'=>$request->tiempo,
        'compania'=>$request->compania,
        'completado'=>$request->completado,
        'fecha_termino'=>$request->fecha_termino,
        'pagina'=>$request->pagina,
        'npagina'=>$request->npagina,
        'desc_problema'=>$request->desc_problema,
        'desc_mejoras'=>$request->desc_mejoras,
        'emite'=>$request->emite,
        'beneficio'=>$request->beneficio,
        'antes_kaizen' => $nombre_a_guardar,
        'despues_kaizen' => $nombre_a_guardar_1,
        ];
// <===========================Guardar PDF======================================>
        $now = Carbon::now();
        $nombre = "Kaizen-".time().".pdf";
        $pdf=PDF::loadView('PDF/Kaizen', $data)->setPaper('a4', 'landscape');
        Storage::disk('kaizen')->put(''.$nombre, $pdf->output());

// <====================== Guardar registro kaizen =============================>
        
        $fecha = Carbon::now();
        $kaizen = new kaizen;
        $kaizen ->nombre = $request->nombre;
        $kaizen ->documento = $nombre;
        $kaizen ->fecha_creacion = $fecha;
        $kaizen ->save();
// <=========================== Elimina la imagen ======================================>
        
        if (file_exists(public_path() . '/storage/public/kaizenImg/' . $nombre_a_guardar)){
           File::delete(public_path() . '/storage/public/kaizenImg/' . $nombre_a_guardar);
        }
        if (file_exists(public_path() . '/storage/public/kaizenImg/' . $nombre_a_guardar_1)){
           File::delete(public_path() . '/storage/public/kaizenImg/' . $nombre_a_guardar_1);
        }
        return redirect('kaizen');
    }
    // <=========================== Rellenar Plantilla ===================================>
    public function mostrarfallo(Request $request){     

        $ifqi= $request->qi;
        $noqui = $request->nqi;

        if($ifqi == "No"){
                $noqui = "N/A";
        }

        $status_1 = $request->status_1;
        if($status_1 == "0"){
                $status_1 = null;
        }
        $status_2 = $request->status_2;
        if($status_2 == "0"){
                $status_2 = null;
        }
        $status_3 = $request->status_3;
        if($status_3 == "0"){
                $status_3 = null;
        }
        $status_4 = $request->status_4;
        if($status_4 == "0"){
                $status_4 = null;
        }
        $status_5 = $request->status_5;
        if($status_5 == "0"){
                $status_5 = null;
        }
        
        $data = [
        'elaboro'=> auth()->user()->name.' '.auth()->user()->app.' '.auth()->user()->apm,
        'fech_lab'=> $request->fech_lab,
        'plataforma'=> $request->plataforma,
        'nparte'=>$request->nparte,
        'qi'=>$request->qi,
        'nqi'=>$noqui,
        'qpaso'=>$request->qpaso,
        'cpaso'=>$request->cpaso,
        'time'=>$request->time,
        'dpaso'=>$request->dpaso,
        'qdetecto'=>$request->qdetecto,
        'c_detec'=>$request->c_detec,
        'pdefecto'=>$request->pdefecto,
        'gen_def'=>$request->gen_def,
        'estandar'=>$request->estandar,
        'npiezas'=>$request->npiezas,
        'frepetitiva'=>$request->frepetitiva,
        'entrevista'=>$request->entrevista,
        /*======================================================*/
        'act1' => $request->act1,
        'resp1' => $request->resp1,
        'fech1' => $request->fech1,
        'valido1' => $request->valido1,
        /*======================================================*/
        'act2' => $request->act2,
        'resp2' => $request->resp2,
        'fech2' => $request->fech2,
        'valido2' => $request->valido2,
        /*======================================================*/
        'act3' => $request->act3,
        'resp3' => $request->resp3,
        'fech3' => $request->fech3,
        'valido3' => $request->valido3,
        /*======================================================*/
        'spz_insp' => $request->spz_insp,
        'spz_pznok' => $request->spz_pznok,
        'lpz_insp' => $request->lpz_insp,
        'lpz_pznok' => $request->lpz_pznok,
        'ppz_insp' => $request->ppz_insp,
        'ppz_pznok' => $request->ppz_pznok,
        'cpz_insp' => $request->cpz_insp,
        'cpz_pznok' => $request->cpz_pznok,
        'tpz_insp' => $request->tpz_insp,
        'tpz_pznok' => $request->tpz_pznok,
        /*======================================================*/
        'problema' => $request->problema,
        'causa1' => $request->causa1,
        'causa2' => $request->causa2,
        'causa3' => $request->causa3,
        'causa4' => $request->causa4,
        'causa5' => $request->causa5,
        /*======================================================*/
        'acc_pro_1' => $request->acc_pro_1,
        'qui_1' => $request->qui_1,
        'cuand_1' => $request->cuand_1,
        'status_1' =>  $status_1,
        'valido_1' => $request->valido_1,
        /*======================================================*/
        'acc_pro_2' => $request->acc_pro_2,
        'qui_2' => $request->qui_2,
        'cuand_2' => $request->cuand_2,
        'status_2' => $status_2,
        'valido_2' => $request->valido_2,
        /*======================================================*/
        'acc_pro_3' => $request->acc_pro_3,
        'qui_3' => $request->qui_3,
        'cuand_3' => $request->cuand_3,
        'status_3' =>  $status_3,
        'valido_3' => $request->valido_3,
        /*======================================================*/
        'acc_pro_4' => $request->acc_pro_4,
        'qui_4' => $request->qui_4,
        'cuand_4' => $request->cuand_4,
        'status_4' =>  $status_4,
        'valido_4' => $request->valido_4,
        /*======================================================*/
        'acc_pro_5' => $request->acc_pro_5,
        'qui_5' => $request->qui_5,
        'cuand_5' => $request->cuand_5,
        'status_5' =>  $status_5,
        'valido_5' => $request->valido_5,
        ];

// <===========================Guardar PDF======================================>      
        $now = Carbon::now();
        $nombre = "Desgaste-".time().".pdf";
        $pdf = PDF::loadView('PDF/Falla_linea', $data);
        Storage::disk('analisisdesgaste')->put(''.$nombre, $pdf->output());

// <===========================Guardar registro Desgaste========================>        
        $fecha = Carbon::now();
        $desgaste = new analisisdesgaste;
        $desgaste ->nombre = $request->nombre;
        $desgaste ->documento = $nombre;
        $desgaste ->fecha_creacion = $fecha;
        $desgaste ->save();

        return redirect('analisisdesgaste');
               
    }
}