<?php

namespace App\Http\Controllers;

use App\Mail\InventarioMail;
use App\Models\calendario;
use App\Models\DetalleStock;
use App\Models\User;
use App\Rules\DeleteStockRule;
use App\Rules\PasswordRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;

class InventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $totalRows = DB::table('calendario')
            ->select(DB::raw('count(*) as total'))
            ->where('status', '1')
            ->first();
        $rowsGrouped = DB::select('SELECT COUNT(cal.id) AS operaciones, op.nombre 
        FROM calendario cal, operaciones op 
        WHERE cal.id_operacion = op.id AND cal.status = 1
        GROUP BY id_operacion, op.nombre');
        $operaciones = DB::select("SELECT cal.id AS id, id_operacion, op.nombre AS nombre_operacion, 
        cal.nombre AS nombre, codigo_alm, pieza_ok, pieza_nok, cal.status AS status, 
        stock, maximo, minimo
        FROM calendario AS cal, operaciones AS op
        WHERE cal.id_operacion = op.id AND cal.status = 1
        ORDER BY id_operacion, cal.id");
        $user = DB::table('users')
            ->join('nivelacceso', 'nivelacceso.id', '=', 'users.id_nivelacceso')
            ->select('users.id', 'users.name', 'users.app', 'users.apm', 'users.nempleado', 'nivelacceso.nombre')
            ->whereIn('users.id_nivelacceso', [1, 2])
            ->get();
        $piezas = DB::table('calendario')
            ->select('id', 'nombre', 'codigo_alm')
            ->where('status', '1')
            ->get();
        return view('inventario.index', [
            'rows' => $totalRows->total,
            'rowsGrouped' => $rowsGrouped,
            'operaciones' => $operaciones,
            'user' => $user,
            'piezas' => $piezas
        ]);
    }
    public function update(Request $request)
    {
        $request->validate([
            'pieza' => 'required | numeric | exists:calendario,id',
            'usuario' => 'required | numeric',
            'numero_piezas' => 'required | numeric | min:1',
            'password' => 'required'
        ]);
        $emple = $request->usuario;
        $user = User::where('nempleado', '=', $emple)->first();
        $pieza = calendario::find($request->pieza);
        $request->validate([
            'numero_piezas' => [new DeleteStockRule($pieza->stock, $request->opcion)],
            'password' => [new PasswordRule($user->password)],
            'opcion' => [Rule::in(['add', 'delete'])]
        ]);
        if (!$user) {
            Alert::info('Info', 'Se debe seleccionar un administrador');
            return back();
        }

        if ($request->opcion == 'add') {
            $opcion = 'agregadas';
            toast('Piezas añadidas', 'success');
        } else if ($request->opcion == 'delete') {
            $opcion = 'removidas';
            if (!$sock = @fsockopen('www.google.com', 80)) {
                toast('Esta operación requiere de conexión a internet. Por favor revisa tu conexión.', 'error');
                return redirect()->action([InventarioController::class, 'index']);
            } else {
                toast('Piezas removidas', 'success');
            }
        }

        $detalleStock = new DetalleStock();
        $detalleStock->id_user = $user->id;
        $detalleStock->id_calendario = $request->pieza;
        $detalleStock->piezas = $request->numero_piezas;
        $detalleStock->opcion = $opcion;
        $detalleStock->save();

        $pieza = calendario::find($request->pieza);
        if ($request->opcion == 'delete' && $pieza->stock <= $pieza->minimo) {
            Mail::to('javiermartinez@amats.com.mx')->queue(new InventarioMail($pieza));
            Mail::to('oscar.roca@amats.com.mx')->queue(new InventarioMail($pieza));
        }

        return redirect()->action([InventarioController::class, 'index']);
    }
}
