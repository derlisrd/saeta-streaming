@extends('Layout.app')


@section('title', 'Cuentas utilizadas');

@section('container')

<h2>Cuentas utilizadas</h2>

<table class="table table-hover mt-4">
    <thead>
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Cuenta</th>
            <th scope="col">Pin</th>
            <th scope="col">Vencimiento</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($cuentas as $c)
            <tr class="table-light">
                <td>{{ $c->nombre_completo }}</td>
                <td >{{ $c->nombre . ' ' . $c->email_cuenta }} </td>
                <td>{{ $c->pin_cuenta }}</td>
                <td>{{ $c->vencimiento }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection

