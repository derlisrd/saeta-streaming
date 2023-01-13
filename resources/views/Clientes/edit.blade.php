@extends('Layout.app')


@section('title','Editar Cliente');

@section('container')

<h3>Registrar cliente</h3>
<form method="post" action="{{ route('cliente.update',$cliente->id) }}">
@method('put')
<input type="hidden" value="{{ $cliente->id }}" name="id" />
@csrf
<div class="card rounded">
    <div class="card-content px-4">
        <div class="form-group mt-4">
            <input autofocus autocomplete="off" name="doc" value="{{ $cliente->doc }}" required class="form-control" />
            <small class="form-text text-muted">Documento</small>
        </div>

        <div class="form-group mt-4">
            <input autocomplete="off" name="nombre_completo" required value="{{ $cliente->nombre_completo }}" class="form-control" />
            <small class="form-text text-muted">Nombre completo</small>
        </div>

        <div class="form-group my-4">
            <button type="submit" class="btn btn-outline-success">Registrar</button>
        </div>
    </div>
</div>
</form>
@endsection
