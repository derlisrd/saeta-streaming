<?php

namespace App\Http\Controllers;

use App\Models\Informe;
use App\Models\Venta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{


    public function index(){
        $now = now()->format('Y-m-d');
        $vencidos = Venta::where('vencimiento','<',"$now")->get();


        $informes = DB::table('informes')->join('ventas','ventas.id','=','informes.venta_id')
            ->join('clientes','ventas.cliente_id','=','clientes.id')
            ->select('ventas.fecha_pago','informes.valor','ventas.pago','clientes.nombre_completo','informes.created_at')->offset(0)->limit(10)->get();


        return view('Home.index',compact('vencidos','informes'));
    }
}
