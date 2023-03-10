<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientesController extends Controller
{

    public function index(Request $r){

        $limit = 30;
        $currentPage = $r->page ?? 1;
        $page = $r->page ? (($r->page-1) * $limit) : 0;

        $clientes = Cliente::offset($page)
            ->limit($limit)
            ->orderBy('id','desc')->get();
        $count = Cliente::all()->count();
        $pages = round( $count / $limit);

        $nextPage = $currentPage<=$pages ? $currentPage + 1 : null;
        $prevPage = ($currentPage - 1)>0 ? $currentPage - 1 : null;

        return view('Clientes.index',compact('clientes','nextPage','prevPage'));
    }

    public function search(Request $r){

        $termSearch = '%'.$r->search.'%';
        $nextPage = null; $prevPage = null;
        $clientes = Cliente::orderBy('nombre_completo','asc')->where([
            [
                'nombre_completo','like',$termSearch
            ]
            ])->get();

        return view('Clientes.index',compact('clientes','nextPage','prevPage'));
    }


    public function create(){
        return view('Clientes.create');
    }

    public function edit($id){
        $cliente = Cliente::find($id);
        return view('Clientes.edit',compact('cliente'));
    }
    public function update(Request $r){
        $r->validate([
            'nombre_completo'=> ['required'],
            'doc'=>['required',"unique:clientes,doc,$r->id"],
        ]);

        $cliente = Cliente::find($r->id);
        $cliente->nombre_completo = $r->nombre_completo;
        $cliente->doc = $r->doc;
        $cliente->tel = $r->tel;
        $cliente->update();

        return redirect()->route('clientes')->with('actualizado',true);
    }


    public function cuentas(Request $r){

        $id = $r->id;
        $cuentas = DB::table('cuentas')
        ->select('cuentas.nombre','cuentas.email_cuenta','clientes.nombre_completo','ventas.vencimiento','ventas.pin_cuenta')
        ->join('ventas','ventas.cuenta_id','=','cuentas.id')
        ->join('clientes','ventas.cliente_id','=','clientes.id')
        ->where('cliente_id',$r->id)
        ->get();


        return view ('Clientes.cuentas',compact('cuentas'));
    }


    public function store (Request $r){
        $r->validate([
            'nombre_completo'=> ['required'],
            'doc'=>['required','unique:clientes,doc'],
        ]);


        $datos = [
            'nombre_completo'=> $r->nombre_completo,
            'doc'=>$r->doc,
            'tel'=>$r->tel
        ];

        Cliente::create($datos);

        return redirect()->route('clientes');

    }

    public function destroy($id){
        $cliente = Cliente::find($id);
        $cliente->delete();
        return redirect()->route('clientes')->with('eliminado',true);
    }


}
