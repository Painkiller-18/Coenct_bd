<?php

namespace App\Http\Controllers;

use App\Models\ayudasvisuales;
use App\Models\calendario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Iluminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class ayudasvisualesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ayudasvisuales = ayudasvisuales::select(
            'id',
            'nombre',
            'pieza',
            'documento',
            DB::raw("FORMAT(fecha_creacion, 'dd MMM yyyy') AS fecha_creacion"),
            DB::raw("FORMAT(fecha_actualizacion, 'dd MMM yyyy') AS fecha_actualizacion"),
            'status'
        )
            ->where('status', 1)
            ->orderBy('id')->get();
        $ayudasvisualesmodal = $ayudasvisuales;
        return view('ayudasvisuales.index',[
            'ayudasvisuales' => $ayudasvisuales,
            'ayudasvisualesmodal' => $ayudasvisualesmodal
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $calendario = calendario::select('nombre','id')
                ->orderBy('id')->get();
        return view('ayudasvisuales.create')
        ->with('calendario',$calendario);
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
            'pieza' => ['required'],
            'documento' => ['required', 'file', 'mimes:pdf'],
            'fecha_creacion' => ['required']
        ]);

        $documento = $request->file('documento')->getClientOriginalName();
        $nombre_documento = pathinfo($documento, PATHINFO_FILENAME);
        $extension_documento = $request->file('documento')->getClientOriginalExtension();
        $nombre_a_guardar = $nombre_documento.'_'.time().'.'.$extension_documento;
        $request->file('documento')->storeAs('public/ayudasvisuales/', $nombre_a_guardar);
        $datos = $request->all();
        $datos['documento'] = $nombre_a_guardar;
        $ayudasvisuales = ayudasvisuales::create($datos);
        $ayudasvisuales->update($datos);
        
        return redirect('/ayudasvisuales');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ayudasvisuales = ayudasvisuales::select(
            'id',
            'nombre',
            'pieza',
            'documento',
            DB::raw("FORMAT(fecha_creacion, 'dd/MMM/yyyy') AS fecha_creacion"),
            DB::raw("FORMAT(fecha_actualizacion, 'dd/MMM/yyyy') AS fecha_actualizacion"),
            'status'
        )
            ->where('id', $id)
            ->first();
        return view('ayudasvisuales.read')->with('ayudasvisuales', $ayudasvisuales);
    }
    public function ver($documento)
    {
        $ayudasvisuales = Storage::disk('public')->getFileName($documento);
        return view('ayudasvisuales.read')->with('ayudasvisuales', $ayudasvisuales);
    }

    /**
     * Show the form for editing the specified resource.*
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ayudasvisuales = ayudasvisuales::find($id);
        return view('ayudasvisuales.edit')->with('ayudasvisuales', $ayudasvisuales);
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
            'nombre' => ['required'],
            'pieza' => ['required'],
            'fecha_creacion' => ['required', 'date'],
        ]);

        if($request->file('documento') == null){
            $datos = $request->all();
            $ayudasvisuales = ayudasvisuales::find($id);
            $ayudasvisuales->update($datos);
            $ayudasvisuales->fecha_actualizacion = DB::raw('SYSDATETIME()');
            $ayudasvisuales->save();
        }else{
            $request->validate([
                'documento' => ['file', 'mimes:pdf']
            ]);
            $documento = $request->file('documento')->getClientOriginalName();
            $nombre_documento = pathinfo($documento, PATHINFO_FILENAME);
            $extension_documento = $request->file('documento')->getClientOriginalExtension();
            $nombre_a_guardar = $nombre_documento.'_'.time().'.'.$extension_documento;
            $request->file('documento')->storeAs('public/ayudasvisuales/', $nombre_a_guardar);
            $datos = $request->all();
            $datos['documento'] = $nombre_a_guardar;
            $ayudasvisuales = ayudasvisuales::find($id);
            $ayudasvisuales->update($datos);
            $ayudasvisuales->fecha_actualizacion = DB::raw('SYSDATETIME()');
            $ayudasvisuales->save();
        }
        return redirect('/ayudasvisuales');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ayudasvisuales = ayudasvisuales::find($id);
        if(!$ayudasvisuales){
            Alert::error('Error al eliminar', 'Ha ocurrido un problema al intentar eliminar el registro.');
        }
        $ayudasvisuales->status = 0;
        $ayudasvisuales->save();
        toast('Ayuda visual eliminada', 'success');
        return redirect('/ayudasvisuales');
    }
}
