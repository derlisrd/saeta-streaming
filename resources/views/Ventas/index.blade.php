@extends('Layout.app')


@section('title', 'Ventas');

@section('container')

    <h2>Ventas</h2>

    <a href="{{ route('ventas.create') }}" class="btn btn-outline-info">Vender</a>
    <table class="table table-hover mt-4">
        <thead>
            <tr>
                <th scope="col">Cliente</th>
                <th scope="col">Cuenta</th>
                <th scope="col">Pago</th>
                <th scope="col">Fecha venc.</th>
                <th scope="col">Vencido</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ventas as $v)
                <tr class="table-light">
                    <th>{{ $v->cliente->nombre_completo }}</th>
                    <td>{{ $v->cuenta->email_cuenta }}</td>
                    <td>{{ number_format($v->pago,0,'','.') }}</td>
                    <td>{{ date('d-m-Y', strtotime($v->vencimiento));  }}</td>
                    <td>
                        @if($v->vencimiento< now())
                            <span class="badge bg-danger">Vencido</span>
                        @else
                            <span class="badge bg-success"> Todo ok</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('ventas.renovar',$v->id) }}" class="btn btn-warning">Renovar</a>
                        <form action="{{ route('ventas.destroy',$v->id) }}" class="d-inline formulario-eliminar" method="post" >
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger">Borrar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('scripts')
    <script>
        @if (session('eliminado'))
            Swal.fire('Borrado!','Tristin ya se eliminó, chau','success')
        @endif

    </script>
    <script>
        $('.formulario-eliminar').submit(function(e){
            e.preventDefault();
            Swal.fire({
            title: 'Borrar',
            text:'Desea borrar esta venta?',
            showCancelButton: true,
            }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            }
            })
        });
    </script>
@endsection
