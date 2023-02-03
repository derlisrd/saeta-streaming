<?php

namespace App\Http\Controllers;

use App\Models\Caja;
use App\Models\Cuenta;
use App\Models\Movimiento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CuentasController extends Controller
{
    //

    public function index(){
        $cuentas = Cuenta::orderBy('nombre','asc')->get();
        return view('Cuentas.index',compact('cuentas'));
    }

    public function edit($id){
        $cuenta = Cuenta::find($id);
        return view ('Cuentas.edit',compact('cuenta'));
    }

    public function update(Request $r){
        $id = $r->id;
        $r->validate([
            'nombre'=> ['required'],
            'email_cuenta'=>['required','email',"unique:cuentas,email_cuenta,$id,id"],
            'valor_unitario'=>['required','numeric'],
            'valor_total'=>['required','numeric'],
            'password'=>['required'],
            'pago_status'=>['required'],
            'fecha_pago'=>['required','date'],
            'vencimiento_pago'=>['required','date'],
        ]);
        $c = Cuenta::find($id);

        $c->nombre=$r->nombre;
        $c->email_cuenta=$r->email_cuenta;
        $c->valor_unitario=$r->valor_unitario;
        $c->valor_total=$r->valor_total;
        $c->password=$r->password;
        $c->pago_status=$r->pago_status;
        $c->fecha_pago=$r->fecha_pago;
        $c->telefono = $r->telefono;
        $c->vencimiento_pago=$r->vencimiento_pago;

        $c->update();

        return redirect()->route('cuentas')->with('updated',true);

    }

    public function create(){

        return view('Cuentas.create');
    }

    public function pagar(){
        $cajas = Caja::all();
        return view('Cuentas.pagar',compact('cajas'));
    }
    public function pagar_store(Request $r){
        $r->validate([
            'cuenta_id'=> ['required'],
            'monto'=>['required','numeric'],
            'caja_id'=>['required'],
            'fecha_pago'=>['required','date'],
            'vencimiento_pago'=>['required','date'],
        ]);

        $caja = Caja::find($r->caja_id);
        $caja->monto -= $r->monto;
        $caja->update();

        $cuenta = Cuenta::find($r->cuenta_id);
        $cuenta->fecha_pago = $r->fecha_pago;
        $cuenta->vencimiento_pago = $r->vencimiento_pago;
        $cuenta->update();

        Movimiento::create([
            'caja_id'=>$r->caja_id,
            'monto'=>$r->monto,
            'fecha'=>$r->fecha_pago,
            'descripcion'=> 'Pago de cuenta '.$cuenta->nombre. ' '.$cuenta->email_cuenta,
            'tipo_movimiento'=>0
        ]);

        return redirect()->route('cuentas')->with('Paid',true);

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
            'cuentas_disponibles'=>$r->cuentas_disponibles,
            'telefono'=>$r->telefono
        ];

        Cuenta::create($datos);

        return redirect()->route('cuentas')->with('saved',true);

    }


    public function cuentas_utilizadas(Request $r){

        $id = $r->id;

        $cuenta = Cuenta::find($id);

        $utilizadas = DB::table('ventas')
        ->select('clientes.nombre_completo','clientes.tel','ventas.vencimiento','ventas.pin_cuenta')
        ->join('cuentas','cuentas.id','=','ventas.cuenta_id')
        ->join('clientes','ventas.cliente_id','=','clientes.id')
        ->where(['cuentas.id' => $id])
        ->orderByDesc('clientes.id')->get();

        return view('Cuentas.utilizadas',compact('utilizadas','cuenta'));
    }

    public function destroy($id){
        $cuenta = Cuenta::find($id);
        $cuenta->delete();
        return redirect()->route('cuentas')->with('deleted',true);
    }
}
