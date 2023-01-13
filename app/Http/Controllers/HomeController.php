<?php

namespace App\Http\Controllers;

use App\Models\Informe;
use App\Models\Venta;
use Illuminate\Http\Request;

class HomeController extends Controller
{


    public function index(){
        $now = now()->format('Y-m-d');
        $vencidos = Venta::where('vencimiento','<',"$now")->get();


        $informes = Informe::offset(0)->limit(10)->get();

        return view('Home.index',compact('vencidos','informes'));
    }
}
