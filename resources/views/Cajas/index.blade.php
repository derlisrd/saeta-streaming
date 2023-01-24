@extends('Layout.app')


@section('title', 'Cajas');

@section('container')

    <div class="row">
        <div class="col-12">
            <h2>Cajas</h2>
            <a href="{{ route('cajas.create') }}" class="btn btn-primary">Registrar</a>
        </div>
        <div class="col-12">
            <table class="table table-hover mt-4">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Monto</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cajas as $c)
                        <tr class="table-light">
                            <td>{{ $c->id }}</td>
                            <td>{{ $c->nombre }}</td>
                            <td>{{ $c->monto }}</td>
                            <td>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
