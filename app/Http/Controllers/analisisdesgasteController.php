<?php

namespace App\Http\Controllers;

use App\Models\analisisdesgaste;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class analisisdesgasteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $analisisdesgaste = analisisdesgaste::select(
            'id',
            'nombre',
            'documento',
            DB::raw("FORMAT(fecha_creacion, 'dd MMM yyyy') AS fecha_creacion"),
            DB::raw("FORMAT(fecha_actualizacion, 'dd MMM yyyy') AS fecha_actualizacion"),
            'status'
        )
            ->where('status', 1)
            ->orderBy('id')->get();
        $analisisdesgastemodal = $analisisdesgaste;
        return view('analisisdesgaste.index', [
            'analisisdesgaste' => $analisisdesgaste,
            'analisisdesgastemodal' => $analisisdesgastemodal
        ]);
    }

    public function upload(){
        return view('analisisdesgaste.upload');
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
        $request->file('documento')->storeAs('public/analisisdesgaste/', $nombre_a_guardar);
        $datos = $request->all();
        $datos['documento'] = $nombre_a_guardar;
        $analisisdesgaste = analisisdesgaste::create($datos);
        $analisisdesgaste->update($datos);
        
        return redirect('/analisisdesgaste');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('analisisdesgaste.create');
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
        analisisdesgaste::create($datos);
        return redirect('/analisisdesgaste');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $analisisdesgaste = analisisdesgaste::select(
            'id',
            'nombre',
            'documento',
            DB::raw("FORMAT(fecha_creacion, 'dd MMM yyyy') AS fecha_creacion"),
            DB::raw("FORMAT(fecha_actualizacion, 'dd MMM yyyy') AS fecha_actualizacion"),
            'status'
        )
            ->where('id', $id)
            ->first();
        return view('analisisdesgaste.read')->with('analisisdesgaste', $analisisdesgaste);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $analisisdesgaste = analisisdesgaste::find($id);
        return view('analisisdesgaste.edit')->with('analisisdesgaste', $analisisdesgaste);
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
            $analisisdesgaste = analisisdesgaste::find($id);
            $analisisdesgaste->update($datos);
            $analisisdesgaste->fecha_actualizacion = DB::raw('SYSDATETIME()');
            $analisisdesgaste->save();
        }else{
            $request->validate([
                'documento' => ['file', 'mimes:pdf']
            ]);
            $documento = $request->file('documento')->getClientOriginalName();
            $nombre_documento = pathinfo($documento, PATHINFO_FILENAME);
            $extension_documento = $request->file('documento')->getClientOriginalExtension();
            $nombre_a_guardar = $nombre_documento.'_'.time().'.'.$extension_documento;
            $request->file('documento')->storeAs('public/analisisdesgaste/', $nombre_a_guardar);
            $datos = $request->all();
            $datos['documento'] = $nombre_a_guardar;
            $analisisdesgaste = analisisdesgaste::find($id);
            $analisisdesgaste->update($datos);
            $analisisdesgaste->fecha_actualizacion = DB::raw('SYSDATETIME()');
            $analisisdesgaste->save();
        }
        return redirect('/analisisdesgaste');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $analisisdesgaste = analisisdesgaste::find($id);
        if(!$analisisdesgaste){
            Alert::error('Error al eliminar', 'Ha ocurrido un problema al intentar eliminar el registro.');
        }
        $analisisdesgaste->status = 0;
        $analisisdesgaste->save();
        toast('Análisis de desgaste eliminado', 'success');

        return redirect('/analisisdesgaste');
    }
}
