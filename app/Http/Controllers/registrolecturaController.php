<?php

namespace App\Http\Controllers;

use App\Models\ayudasvisuales;
use App\Models\registrolectura;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class registrolecturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registrolectura = registrolectura::select('id','id_users','id_ayudavisual', 
        DB::raw("FORMAT(fecha_enterado, 'dd MMM yyyy HH:MM:ss') AS fecha_enterado"))
        ->where('status', '1')->orderBy('id')->get();
        return view('registrolectura.index')->with('registrolectura',$registrolectura);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() 
    {
        $users = User::select('name','id')
                ->orderBy('id')->get();
        $ayudasvisuales = ayudasvisuales::select('nombre','id')
                ->orderBy('id')->get();
        return view('registrolectura.create')
                ->with('users',$users)
                ->with('ayudasvisuales',$ayudasvisuales);
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
                'id_users' => ['required'],
                'id_ayudavisual' => ['required'],
                'status' => ['required'],            
        ]);

        $datos = $request->all();
        registrolectura::create($datos);
        return redirect('/registrolectura');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $registrolectura = registrolectura::select('id','id_users','id_ayudavisual', 
        DB::raw("FORMAT(fecha_enterado, 'dd MMM yyyy HH:MM:ss') AS fecha_enterado"))
        ->where('id',$id)->first();
        //$registrolectura = registrolectura::find($id);
        return view('registrolectura.read')->with('registrolectura',$registrolectura);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $registrolectura = registrolectura::find($id);

        $users = User::select('name','id')
                ->orderBy('id')->get();
        $ayudasvisuales = ayudasvisuales::select('nombre','id')
                ->orderBy('id')->get();
        return view('registrolectura.edit')
                ->with('users',$users)
                ->with('ayudasvisuales',$ayudasvisuales)
                ->with('registrolectura', $registrolectura);
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
                'id_users' => ['required'],
                'id_ayudavisual' => ['required'],
                'status' => ['required'],            
        ]);

        $datos = $request->all();
        $registrolectura = registrolectura::find($id);
        $registrolectura->update($datos);
        return redirect('/registrolectura');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $registrolectura = registrolectura::find($id);
        $registrolectura->status = 0;
        $registrolectura->save();
        toast('Registro de lectura eliminado', 'success');
        return redirect('/registrolectura');
    }
}
