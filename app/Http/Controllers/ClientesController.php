<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClientesController extends Controller
{

    public function index(){
        $clientes = Cliente::all();
        return view('Clientes.index',compact('clientes'));
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
        $cliente->update();

        return redirect()->route('clientes')->with('actualizado',true);
    }




    public function store (Request $r){
        $r->validate([
            'nombre_completo'=> ['required'],
            'doc'=>['required','unique:clientes,doc'],
        ]);


        $datos = [
            'nombre_completo'=> $r->nombre_completo,
            'doc'=>$r->doc,
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
