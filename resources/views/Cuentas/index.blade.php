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
                <th scope="col">Tel</th>
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
                    <td>{{ $c->telefono }}</td>
                    <td> @if( $c->cuentas_disponibles ==0 ) <span class="badge bg-danger">No disponible</span>  @else <span class="badge bg-success"> {{ $c->cuentas_disponibles }} Disponibles</span>  @endif </td>
                    <td>
                        <a href="{{ route('cuentas.utilizadas',$c->id) }}" class="btn btn-info btn-sm">Ver</a>

                        <a href="{{ route('cuentas.pagar',$c->id) }}" class="btn btn-info btn-sm">Pagar</a>

                        <a href="{{ route('cuentas.edit',$c->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('cuentas.destroy',$c->id) }}" class="d-inline formulario-eliminar" method="post" >
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Borrar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


@endsection

@section('scripts')
<script>
    @if (session('Paid'))
        Swal.fire('Pagado!', 'Cuenta ha sido pagada', 'success')
    @endif

        @if (session('deleted'))
            Swal.fire('Borrado!','Tu cuenta ha sido borrada','success')
        @endif
    </script>
    <script>
        $('.formulario-eliminar').submit(function(e){
            e.preventDefault();
            Swal.fire({
            title: 'Borrar',
            text:'Desea borrar esta cuenta?',
            showCancelButton: true,
            }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            }
            })
        });
    </script>

@endsection
