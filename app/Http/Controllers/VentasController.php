<?php

namespace App\Http\Controllers;

use App\Models\Cuenta;
use App\Models\Informe;
use App\Models\Venta;
use Illuminate\Http\Request;

class VentasController extends Controller
{
    public function index(){

        $ventas = Venta::orderBy('vencimiento', 'asc')->get();
        return view('Ventas.index',compact('ventas'));
    }

    public function create(){
        return view('Ventas.create');
    }

    public function store (Request $r){
        $r->validate([
            'cliente_id'=> ['required'],
            'cuenta_id'=>['required'],
            'pago'=>['required','numeric'],
            'fecha_pago'=>['required','date'],
            'vencimiento'=>['required','date'],
            'status_pago'=>['required']
        ]);
        $datos = [
            'cliente_id'=> $r->cliente_id,
            'cuenta_id'=>$r->cuenta_id,
            'pago'=>$r->pago,
            'vencimiento'=>$r->vencimiento,
            'status_pago'=>$r->status_pago,
            'fecha_pago'=>$r->fecha_pago
        ];
        $venta= Venta::create($datos);
        Informe::create([
            'valor'=>$r->pago,
            'venta_id'=>$venta->id
        ]);
        $cuenta = Cuenta::find($r->cuenta_id);
        $cuenta->cuentas_disponibles = $cuenta->cuentas_disponibles - 1;
        $cuenta->update();
        return redirect()->route('ventas');
    }

    public function renovar($id){
        $venta = Venta::find($id);
        return view('Ventas.renovar',compact('venta'));
    }


    public function renovar_store(Request $r){
        $r->validate([
            'fecha_pago'=>['required','date'],
            'vencimiento'=>['required','date'],
            'pago'=>['required','numeric'],
        ]);
        $id = $r->id;
        $venta = Venta::find($id);
        $venta->fecha_pago = $r->fecha_pago;
        $venta->vencimiento = $r->vencimiento;
        $venta->update();

        Informe::create([
            'valor'=>$r->pago,
            'venta_id'=>$id
        ]);

        return redirect()->route('ventas');
    }




    public function destroy($id){
        $c = Venta::find($id);
        $cuenta_id = $c->cuenta_id;
        $cuenta = Cuenta::find($cuenta_id);
        $cuenta->cuentas_disponibles = $cuenta->cuentas_disponibles + 1;
        $cuenta->update();
        $c->delete();
        return redirect()->route('ventas')->with('eliminado',true);
    }


}
