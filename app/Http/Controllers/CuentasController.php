<?php

namespace App\Http\Controllers;

use App\Models\Cuenta;
use Illuminate\Http\Request;

class CuentasController extends Controller
{
    //

    public function index(){
        $cuentas = Cuenta::all();
        return view('Cuentas.index',compact('cuentas'));
    }

    public function create(){
        return view('Cuentas.create');
    }


    public function store (Request $r){
        $r->validate([
            'nombre'=> ['required'],
            'email_cuenta'=>['required','email','unique:cuentas,email_cuenta'],
            'valor_unitario'=>['required','numeric'],
            'valor_total'=>['required','numeric'],
            'password'=>['required'],
            'pago_status'=>['required'],
            'fecha_pago'=>['required','date'],
            'vencimiento_pago'=>['required','date'],
            'cuentas_disponibles'=>['required','numeric','max:20','min:0'],
        ]);


        $datos = [
            'nombre'=>$r->nombre,
            'email_cuenta'=>$r->email_cuenta,
            'valor_unitario'=>$r->valor_unitario,
            'valor_total'=>$r->valor_total,
            'password'=>$r->password,
            'pago_status'=>$r->pago_status,
            'fecha_pago'=>$r->fecha_pago,
            'vencimiento_pago'=>$r->vencimiento_pago,
            'cuentas_disponibles'=>$r->cuentas_disponibles
        ];

        Cuenta::create($datos);

        return redirect()->route('cuentas')->with('saved',true);

    }
}
