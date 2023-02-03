@extends('Layout.app')


@section('title', 'Cuentas utilizadas');

@section('container')

    <p>Cuenta: {{ $cuenta->email_cuenta }} {{ $cuenta->nombre }}</p>
    <p>Clave: {{ $cuenta->password }}</p>


    <a href="{{ route('cuentas') }}" class="btn btn-info">Volver</a>



    <table class="table table-hover mt-4">
        <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">PIN</th>
                <th scope="col">Tel</th>
                <th scope="col">Fecha Venc.</th>
                <th scope="col">Vencido</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($utilizadas as $u)
                <tr class="table-light">
                    <td>{{ $u->nombre_completo }}</td>
                    <td>{{ $u->pin_cuenta }}</td>
                    <td>{{ $u->tel }}</td>
                    <td>{{ date('d-m-Y', strtotime($u->vencimiento)); }}</td>
                    <td>
                        @if($u->vencimiento< now())
                            <span class="badge bg-danger">Vencido</span>
                        @else
                            <span class="badge bg-success"> Todo ok</span>
                        @endif
                    </td>
                    <td></td>
                </tr>
            @endforeach
        </tbody>
    </table>


@endsection
