@extends('Layout.app')


@section('title','Registrar nueva Caja');

@section('container')

<h3>Registrar nueva caja</h3>
<form method="post" action="{{ route('cajas.store') }}">
    @csrf
<div class="card rounded">
    <div class="card-content px-4">
        <div class="form-floating my-4">
            <input autofocus autocomplete="off" id="nombre" name="nombre" value="{{ old('nombre') }}" placeholder="Nombre..." required class="form-control" />
            <label for="nombre">Nombre</label>
        </div>
        <div class="form-floating my-4">
            <input autocomplete="off" type="number" id="monto" placeholder="Nombre completo" name="monto" required value="{{ old('monto') }}" class="form-control" />
            <label for="monto">Monto</label>
        </div>
        <div class="form-group my-4">
            <button type="submit" class="btn btn-outline-success">Registrar</button>
        </div>
    </div>
</div>
</form>
@endsection
