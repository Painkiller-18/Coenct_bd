<?php

namespace App\Http\Middleware;

use App\Http\Controllers\DashboardController;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MDadministrador
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        $usuario_actual=Auth::user();
        if(isset($usuario_actual)){
            if($usuario_actual->id_nivelacceso!=1){
                return redirect('/error');
            }  
        }
        else
        return redirect()->to('/dashboard');
        return $next($request);
    } 
}
