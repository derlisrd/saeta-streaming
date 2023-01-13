@extends('Layout.app')


@section('title', 'Cuentas');

@section('container')

    <h2>Cuentas</h2>

    <a href="{{ route('cuentas.create') }}" class="btn btn-outline-info">Registrar</a>



    <table class="table table-hover mt-4">
        <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Email</th>
                <th scope="col">Contraseña</th>
                <th scope="col">Unitario</th>
                <th scope="col">Total</th>
                <th scope="col">Vencimiento</th>
                <th scope="col">Estado</th>
                <th scope="col">Disponibles</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cuentas as $c)
                <tr class="table-light">
                    <th>{{ $c->nombre }}</th>
                    <td>{{ $c->email_cuenta }}</td>
                    <td>{{ $c->password }}</td>
                    <td>{{ $c->valor_unitario }}</td>
                    <td>{{ $c->valor_total }}</td>
                    <th>{{ $c->vencimiento_pago }}</th>
                    <th>{{ $c->pago_status }}</th>
                    <th>{{ $c->cuentas_disponibles }}</th>
                    <td>
                        <a href="#" class="btn btn-warning btn-sm">Editar</a>
                        <a href="#" class="btn btn-danger btn-sm">Borrar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


@endsection
