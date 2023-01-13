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

}
