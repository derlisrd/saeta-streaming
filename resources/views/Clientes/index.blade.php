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
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clientes as $c)
                <tr class="table-light">
                    <th scope="row">{{ $c->doc }}</th>
                    <td>{{ $c->nombre_completo }}</td>
                    <td>
                        <a href="#" class="btn btn-warning btn-sm">Editar</a>
                        <a href="#" class="btn btn-danger btn-sm">Borrar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


@endsection
