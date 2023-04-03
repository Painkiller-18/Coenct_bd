<?php

namespace App\Http\Controllers;

use App\Models\kaizen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class kaizenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kaizen = kaizen::select(
            'id',
            'nombre',
            'documento',
            DB::raw("FORMAT(fecha_creacion, 'dd MMM yyyy') AS fecha_creacion"),
            DB::raw("FORMAT(fecha_actualizacion, 'dd MMM yyyy') AS fecha_actualizacion"),
            'status'
        )
            ->where('status', 1)
            ->orderBy('id')->get();
        $kaizenmodal = $kaizen;
        return view('kaizen.index', [
            'kaizen' => $kaizen,
            'kaizenmodal' => $kaizenmodal
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kaizen/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*Segmento de código para la válidación*/
        $request->validate([
            'nombre' => ['required'],
            'documento' => ['required'],
            'fecha_creacion' => ['required'],
            'status' => ['required'],
        ]);

        $datos = $request->all();
        kaizen::create($datos);
        return redirect('/kaizen');
    }

    public function upload(){
        return view('kaizen.upload');
    }

    public function storeUploaded(Request $request){
        /*Segmento de código para la válidación*/
        $request->validate([
            'nombre' => ['required'],
            'documento' => ['required', 'file', 'mimes:pdf'],
            'fecha_creacion' => ['required']
        ]);

        $documento = $request->file('documento')->getClientOriginalName();
        $nombre_documento = pathinfo($documento, PATHINFO_FILENAME);
        $extension_documento = $request->file('documento')->getClientOriginalExtension();
        $nombre_a_guardar = $nombre_documento.'_'.time().'.'.$extension_documento;
        $request->file('documento')->storeAs('public/kaizen/', $nombre_a_guardar);
        $datos = $request->all();
        $datos['documento'] = $nombre_a_guardar;
        $kaizen = kaizen::create($datos);
        $kaizen->update($datos);
        
        return redirect('/kaizen');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kaizen = kaizen::select(
            'id',
            'nombre',
            'documento',
            DB::raw("FORMAT(fecha_creacion, 'dd MMM yyyy') AS fecha_creacion"),
            DB::raw("FORMAT(fecha_actualizacion, 'dd MMM yyyy') AS fecha_actualizacion"),
            'status'
        )
        ->where('id', $id)
        ->first();
        return view('kaizen.read')->with('kaizen', $kaizen);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kaizen = kaizen::find($id);
        return view('kaizen.edit')->with('kaizen', $kaizen);
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
        /*Segmento de código para la válidación*/
        $request->validate([
            'nombre' => ['required']
        ]);
        if($request->file('documento') == null){
            $datos = $request->all();
            $kaizen = kaizen::find($id);
            $kaizen->update($datos);
        }else{
            $request->validate([
                'documento' => ['file', 'mimes:pdf']
            ]);
            $documento = $request->file('documento')->getClientOriginalName();
            $nombre_documento = pathinfo($documento, PATHINFO_FILENAME);
            $extension_documento = $request->file('documento')->getClientOriginalExtension();
            $nombre_a_guardar = $nombre_documento.'_'.time().'.'.$extension_documento;
            $request->file('documento')->storeAs('public/kaizen/', $nombre_a_guardar);
            $datos = $request->all();
            $datos['documento'] = $nombre_a_guardar;
            $kaizen = kaizen::find($id);
            $kaizen->update($datos);
        }
        return redirect('/kaizen');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kaizen = kaizen::find($id);
        if(!$kaizen){
            Alert::error('Error al eliminar', 'Ha ocurrido un problema al intentar eliminar el registro.');
        }
        $kaizen->status = 0;
        $kaizen->save();
        toast('El Kaizen ha sido eliminado', 'success');
        return redirect('/kaizen');
    }
}
