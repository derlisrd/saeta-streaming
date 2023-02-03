<?php

namespace App\Http\Controllers;

use App\Models\Caja;
use App\Models\Cuenta;
use App\Models\FormasPago;
use App\Models\Informe;
use App\Models\Movimiento;
use App\Models\Venta;
use Illuminate\Http\Request;

class VentasController extends Controller
{
    public function index(){

        $ventas = Venta::orderBy('vencimiento', 'asc')->get();

        $tipos = ['1'=>'Efectivo','2'=>'Giro','3'=>'Transferencia'];

        return view('Ventas.index',compact('ventas','tipos'));
    }

    public function create(){
        $formas = FormasPago::all();
        $cajas = Caja::all();
        return view('Ventas.create',compact('formas','cajas'));
    }
    public function edit(Request $r){
        $formas = FormasPago::all();
        $cajas = Caja::all();
        $venta = Venta::find($r->id);
        return view('Ventas.edit',compact('formas','cajas','venta'));
    }

    public function update(Request $r,$id){

        $r->validate([
            'fecha_pago'=>['required','date'],
            'vencimiento'=>['required','date'],
        ]);

        $venta = Venta::find($id);
        $venta->fecha_pago = $r->fecha_pago;
        $venta->vencimiento = $r->vencimiento;
        $venta->pin_cuenta = $r->pin_cuenta;
        $venta->update();

        return redirect()->route('ventas')->with('updated',true);
    }





    public function store (Request $r){
        $r->validate([
            'cliente_id'=> ['required'],
            'cuenta_id'=>['required'],
            'caja_id'=>['required'],
            'pago'=>['required','numeric'],
            'fecha_pago'=>['required','date'],
            'vencimiento'=>['required','date'],
            'status_pago'=>['required'],
            'forma_pago'=>['required']
        ]);
        $datos = [
            'cliente_id'=> $r->cliente_id,
            'cuenta_id'=>$r->cuenta_id,
            'caja_id'=>$r->caja_id,
            'pago'=>$r->pago,
            'vencimiento'=>$r->vencimiento,
            'status_pago'=>$r->status_pago,
            'fecha_pago'=>$r->fecha_pago,
            'pin_cuenta'=>$r->pin_cuenta,
            'forma_pago'=>$r->forma_pago,
            'ref'=>$r->ref
        ];
        Venta::create($datos);

        $caja = Caja::find($r->caja_id);
        $nuevo_monto = $caja->monto + $r->pago;
        $caja->monto = $nuevo_monto;
        $caja->update();




        $cuenta = Cuenta::find($r->cuenta_id);
        $cuenta->cuentas_disponibles = $cuenta->cuentas_disponibles - 1;
        Movimiento::create([
            'caja_id'=>$r->caja_id,
            'monto'=>$r->pago,
            'fecha'=>$r->fecha_pago,
            'tipo_movimiento'=>1,
            'descripcion'=>'Venta de perfil de '.$cuenta->nombre
        ]);
        $cuenta->update();
        return redirect()->route('ventas');
    }

    public function renovar($id){
        $venta = Venta::find($id);
        $cajas = Caja::all();
        return view('Ventas.renovar',compact('venta','cajas'));
    }


    public function renovar_store(Request $r){
        $r->validate([
            'fecha_pago'=>['required','date'],
            'vencimiento'=>['required','date'],
            'pago'=>['required','numeric'],
            'caja_id'=>['required']
        ]);
        $id = $r->id;
        $venta = Venta::find($id);
        $venta->pago = $r->pago;
        $venta->fecha_pago = $r->fecha_pago;
        $venta->vencimiento = $r->vencimiento;
        $venta->pin_cuenta = $r->pin_cuenta;
        $venta->update();

        $caja = Caja::find($r->caja_id);

        $caja->monto += $r->pago;
        $caja->update();


        Movimiento::create([
            'caja_id'=>$r->caja_id,
            'monto'=>$r->pago,
            'fecha'=>$r->fecha_pago,
            'tipo_movimiento'=>1,
            'descripcion'=>'Renovación de perfil de '.$venta->cuenta->nombre
        ]);


        return redirect()->route('ventas')->with('renovado',true);
    }





    public function destroy($id){
        $c = Venta::find($id);
        $cuenta_id = $c->cuenta_id;
        $cuenta = Cuenta::find($cuenta_id);
        $cuenta->cuentas_disponibles += 1;
        $cuenta->update();
        $c->delete();
        return redirect()->route('ventas')->with('eliminado',true);
    }


}
