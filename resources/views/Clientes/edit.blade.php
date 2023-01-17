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
        <div class="form-floating my-4">
            <input autofocus autocomplete="off" name="doc" value="{{ $cliente->doc }}" required class="form-control" />
            <label class="form-text text-muted">Documento</label>
        </div>

        <div class="form-floating my-4">
            <input autocomplete="off" name="nombre_completo" required value="{{ $cliente->nombre_completo }}" class="form-control" />
            <label class="form-text text-muted">Nombre completo</label>
        </div>

        <div class="form-floating my-4">
            <input autocomplete="off" id="tel" type="tel" placeholder="Telefono" name="tel" required value="{{ $cliente->tel }}" class="form-control" />
            <label for="tel">Teléfono</label>
        </div>

        <div class="form-group my-4">
            <button type="submit" class="btn btn-outline-success">Actualizar</button>
        </div>
    </div>
</div>
</form>
@endsection
