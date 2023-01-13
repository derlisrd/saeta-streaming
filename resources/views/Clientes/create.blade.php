@extends('Layout.app')


@section('title','Registrar Cliente');

@section('container')

<h3>Registrar cliente</h3>
<form method="post" action="{{ route('clientes.store') }}">
    @csrf
<div class="card rounded">
    <div class="card-content px-4">
        <div class="form-floating my-4">
            <input autofocus autocomplete="off" id="doc" name="doc" value="{{ old('doc') }}" placeholder="Doc..." required class="form-control" />
            <label for="doc">Documento</label>
        </div>

        <div class="form-floating my-4">
            <input autocomplete="off" id="nombre_completo" placeholder="Nombre completo" name="nombre_completo" required value="{{ old('nombre_completo') }}" class="form-control" />
            <label for="nombre_completo">Nombre completo</label>
        </div>
        <div class="form-floating my-4">
            <input autocomplete="off" id="tel" type="tel" placeholder="Telefono" name="tel" required value="{{ old('tel') }}" class="form-control" />
            <label for="tel">Teléfono</label>
        </div>

        <div class="form-group my-4">
            <button type="submit" class="btn btn-outline-success">Registrar</button>
        </div>
    </div>
</div>
</form>
@endsection
