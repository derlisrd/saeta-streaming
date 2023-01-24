<?php

namespace App\Http\Controllers;

use App\Models\Caja;
use App\Models\Movimiento;
use Illuminate\Http\Request;

class MovimientosController extends Controller
{

    public function index()
    {

        $movimientos = Movimiento::all();
        return view('Movimientos.index',compact('movimientos'));
    }

    public function movimientos_caja(Request $r){
        $caja_id = $r->id;
        $cajas_nombre = Caja::find($caja_id)->nombre;
        $movimientos = Movimiento::where(['caja_id'=>$caja_id])->get();
        return view('Movimientos.index',compact('movimientos','cajas_nombre'));
    }

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
