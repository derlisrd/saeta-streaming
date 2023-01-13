@extends('Layout.app')


@section('title', 'Clientes');

@section('container')

    <h2>Clientes</h2>

    <a href="{{ route('clientes.create') }}" class="btn btn-outline-info">Registrar</a>



    <table class="table table-hover mt-4">
        <thead>
            <tr>
                <th scope="col">Documento</th>
                <th scope="col">Nombre</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clientes as $c)
                <tr class="table-light">
                    <td >{{ $c->doc }}</td>
                    <td>{{ $c->nombre_completo }}</td>
                    <td>{{ $c->tel }}</td>
                    <td>
                        <a href="{{ route('cliente.edit',$c->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('cliente.destroy',$c->id) }}" class="d-inline formulario-eliminar" method="post" >
                            @csrf
                            @method('delete')
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
        @if (session('eliminado'))
            Swal.fire('Borrado!','Tristin ya se eliminó, chau','success')
        @endif

        @if (session('actualizado'))
            Swal.fire('Actualizado!','Cliente actualizado correctamente','success')
        @endif
    </script>
    <script>
        $('.formulario-eliminar').submit(function(e){
            e.preventDefault();
            Swal.fire({
            title: 'Borrar',
            text:'Desea borrar este cliente?',
            showCancelButton: true,
            }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            }
            })
        });
    </script>
@endsection

