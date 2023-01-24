@extends('Layout.app')


@section('title','Movimientos')

@section('container')

<div class="row">
    <div class="col-12">
        <h2>Movimientos de cajas</h2>
        <h2>{{ $cajas_nombre }}</h2>
    </div>
    <div class="col-12">
        <table class="table table-hover mt-4">
            <thead>
                <tr>
                    <th scope="col">Caja</th>
                    <th scope="col">Monto</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($movimientos as $m)
                    <tr class="table-light">
                        <td>{{ $m->caja->nombre }}</td>
                        <td>{{ number_format($m->monto,0,'','.') }}</td>
                        <td>@if($m->tipo_movimiento===1) <span class="badge rounded-pill bg-success">Ingreso</span> @else <span class="badge rounded-pill bg-secondary">Egreso</span>  @endif </td>
                        <td>{{ $m->descripcion }}</td>
                        <td></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


@endsection
