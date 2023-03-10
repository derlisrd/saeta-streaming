@extends('Layout.app')


@section('title', 'Clientes');

@section('container')

    <h2>Clientes</h2>



    <div class="row">
        <div class="col-12">
            <a href="{{ route('clientes.create') }}" class="btn btn-outline-info">Registrar</a>
            <a href="{{ route('clientes') }}" class="btn btn-outline-success">Ver todos</a>
        </div>
        <div class="col-12">
            <form action="{{ route('clientes.search') }}" method="post" >
                @csrf
                <div class="form-floating my-4">
                    <input autocomplete="off" id="search" placeholder="search" name="search" required value="{{ old('search') }}" class="form-control" />
                    <label for="search">Buscar...</label>
                </div>
            </form>
        </div>
        <div class="col-12">
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
                            <td>{{ $c->doc }}</td>
                            <td>{{ $c->nombre_completo }}</td>
                            <td>{{ $c->tel }}</td>
                            <td>
                                <a href="{{ route('cliente.cuentas', $c->id) }}" class="btn btn-success btn-sm">Ver
                                    cuentas</a>
                                <a href="{{ route('cliente.edit', $c->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('cliente.destroy', $c->id) }}" class="d-inline formulario-eliminar"
                                    method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm">Borrar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-12">
            <div class="d-flex justify-content-center">
                <nav>
                    <ul class="pagination">
                        <li class="page-item">
                            @if ($prevPage)
                                <a class="page-link" href="{{ route('clientes.paginate', $prevPage) }}" rel="prev"
                                    aria-label="« Previous">‹Anterior</a>
                            @endif
                        </li>
                        <li class="page-item">
                            @if ($nextPage)
                                <a class="page-link" href="{{ route('clientes.paginate', $nextPage) }}" rel="next"
                                    aria-label="Next »">Siguiente›</a>
                            @endif
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        @if (session('eliminado'))
            Swal.fire('Borrado!', 'Tristin ya se eliminó, chau', 'success')
        @endif

        @if (session('actualizado'))
            Swal.fire('Actualizado!', 'Cliente actualizado correctamente', 'success')
        @endif
    </script>
    <script>
        $('.formulario-eliminar').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Borrar',
                text: 'Desea borrar este cliente?',
                showCancelButton: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })
        });
    </script>
@endsection
