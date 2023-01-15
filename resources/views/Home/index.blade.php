@extends('Layout.app')


@section('title','Home');

@section('container')



<div class="row">
    <div class="col-12 col-md-6">
        <div class="alert alert-danger">
            <h5>Clientes con cuentas vencidas</h5>
        </div>
        <table class="table table-hover mt-4">
            <thead>
                <tr>
                    <th scope="col">Cuenta</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vencidos as $v)
                    <tr class="table-light">
                        <th>{{ $v->cuenta->nombre }}</th>
                        <td>{{ $v->cliente->nombre_completo}}</td>
                        <td>{{ $v->vencimiento }}</td>
                        <td>
                            <a href="#" class="btn btn-warning btn-sm">Editar</a>
                            <a href="#" class="btn btn-danger btn-sm">Borrar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="col-12 col-md-6">
        <div class="alert alert-info">
            <h5>Informes de ventas</h5>
        </div>
        <table class="table table-hover mt-4">
            <thead>
                <tr>
                    <th scope="col">Cliente</th>
                    <th scope="col">Pago</th>
                    <th scope="col">Fecha Pago</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($informes as $i)
                    <tr class="table-light">
                        <th>{{ $i->nombre_completo }}</th>
                        <th>{{ $i->valor }}</th>
                        <td>{{ $i->fecha_pago ?? $i->created_at}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>



@endsection
