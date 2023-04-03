<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\areatrabajo;
use App\Models\departamento;
use App\Models\nivelacceso;
use App\Models\puesto;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class usersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('status',1)
            ->orderBy('id')->get();
        return view('users.index')->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departamento = departamento::select('nombre','id')
                ->orderBy('id')->get();
        $nivelacceso = nivelacceso::select('nombre','id')
                ->orderBy('id')->get();
        $puesto = puesto::select('nombre','id')
                ->orderBy('id')->get();
        $areatrabajo = areatrabajo::select('nombre','id')
                ->orderBy('id')->get();
        return view('users.create')
                ->with('departamento',$departamento)
                ->with('nivelacceso',$nivelacceso)
                ->with('puesto',$puesto)
                ->with('areatrabajo',$areatrabajo);
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
            'name' => 'required',
            'app' => 'required',
            'apm' => 'required',
            'nempleado' => 'required|unique:users,nempleado',
            'email' => 'required | email:rfc,dns |unique:users,email',
            'id_departamento' => 'required | numeric | exists:departamento,id',
            'id_puesto' => 'required | numeric | exists:puesto,id',
            'id_nivelacceso' => 'required | numeric | exists:nivelacceso,id',
            'id_areatrabajo' => 'required | numeric | exists:areatrabajo,id',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password',
                
        ]);

        $datos = $request->all();

        User::create($datos);
        return redirect('/register');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = User::find($id);
        return view('users.read')->with('users',$users);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::find($id);

        $departamento = departamento::select('nombre','id')
                ->orderBy('id')->get();
        $nivelacceso = nivelacceso::select('nombre','id')
                ->orderBy('id')->get();
        $puesto = puesto::select('nombre','id')
                ->orderBy('id')->get();
        $areatrabajo = areatrabajo::select('nombre','id')
                ->orderBy('id')->get();
        $departamentos = departamento::all();
        return view('users.edit')
                ->with('departamento',$departamento)
                ->with('nivelacceso',$nivelacceso)
                ->with('puesto',$puesto)
                ->with('areatrabajo',$areatrabajo)
                ->with('users', $users);
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
            'name' => 'required',
            'app' => 'required',
            'apm' => 'required',
            'nempleado' => 'required',
            'email' => 'required',
            'id_departamento' => 'required',
            'id_puesto' => 'required',
            'id_nivelacceso' => 'required',
            'id_areatrabajo' => 'required'
        ]);
        
        $datos = $request->all();
        $users = User::find($id);
        if($users->email != $request->input('email')){
            $request->validate([
                'email' => 'unique:users,email'
            ]);
        }
        if($users->nempleado != $request->input('nempleado')){
            $request->validate([
                'nempleado' => 'unique:users,nempleado'
            ]);
        }
        $users->update($datos);
        return redirect('/register');
    }

    public function Updpassword(Request $request, $id)
        {
        $request->validate([
            'password_edit' => 'required|min:8',
            'password_confirmation' => 'required|same:password_edit',
        ]);
        
        $datos = $request->all();
        $users = User::find($id);
        $users->password = $request->input('password_edit');
        $users->update($datos);
        return redirect('/register');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = User::find($id);
        if(!$users){
            Alert::error('Error al eliminar', 'Ha ocurrido un problema al intentar eliminar el registro.');
        }
        $users->status = 0;
        $users->save();
        toast('El usuario ha sido eliminado', 'success');

        return redirect('/register');
    }
}
