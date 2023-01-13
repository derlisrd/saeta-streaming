@extends('Layout.app')


@section('title','Registrar Cliente');

@section('container')

<h3>Registrar cliente</h3>
<form method="post" action="{{ route('clientes.store') }}">
    @csrf
<div class="card rounded">
    <div class="card-content px-4">
        <div class="form-group mt-4">
            <input autofocus autocomplete="off" name="doc" value="{{ old('doc') }}" required class="form-control" />
            <small class="form-text text-muted">Documento</small>
        </div>

        <div class="form-group mt-4">
            <input autocomplete="off" name="nombre_completo" required value="{{ old('nombre_completo') }}" class="form-control" />
            <small class="form-text text-muted">Nombre completo</small>
        </div>

        <div class="form-group my-4">
            <button type="submit" class="btn btn-outline-success">Registrar</button>
        </div>
    </div>
</div>
</form>
@endsection
