<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class error2Controller extends Controller
{
    public function index(){
        return view('error2.index');
    }
}
