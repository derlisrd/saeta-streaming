<?php

namespace App\Http\Controllers;

use App\Models\Caja;
use Illuminate\Http\Request;

class CajasController extends Controller
{
    public function index(){
        $cajas = Caja::all();
        return view('Cajas.index',compact('cajas'));
    }
    public function create(){
        return view('Cajas.create');
    }
    public function store(Request $r){
        $r->validate([
            'nombre'=>['required'],
            'monto'=>['required','numeric'],
        ]);
        Caja::create([
            'nombre'=>$r->nombre,
            'monto'=>$r->monto
        ]);
        return redirect()->route('cajas')->with('created',true);
    }
    public function edit(){

    }
    public function update(Request $r){

    }
    public function destroy($id){

    }
}
