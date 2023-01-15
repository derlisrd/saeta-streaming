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
                <th scope="col">Disponibles</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cuentas as $c)
                <tr class="table-light">
                    <td>{{ $c->nombre }}</td>
                    <td>{{ $c->email_cuenta }}</td>
                    <td>{{ $c->password }}</td>
                    <td>{{ number_format($c->valor_unitario,0,'','.')  }}</td>
                    <td>{{ number_format($c->valor_total,0,'','.')  }}</td>
                    <td>
                        @if($c->vencimiento_pago< now())
                            <span class="badge bg-danger">Vencido</span>
                        @else
                            <span class="badge bg-success"> Todo ok</span>
                        @endif
                    </td>
                    <td> @if( $c->cuentas_disponibles ==0 ) <span class="badge bg-danger">No disponible</span>  @else <span class="badge bg-success"> {{ $c->cuentas_disponibles }} Disponibles</span>  @endif </td>
                    <td>
                        <a href="{{ route('cuentas.utilizadas',$c->id) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('cuentas.edit',$c->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <a href="#" class="btn btn-danger btn-sm">Borrar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


@endsection
