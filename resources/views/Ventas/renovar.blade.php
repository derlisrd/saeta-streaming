@extends('Layout.app')


@section('title','Renovar Venta');

@section('container')

<h3>Renovar</h3>
<form method="post" action="{{ route('ventas.renovar.store') }}">
    <input type="hidden" value="{{ $venta->id }}" name="id" />
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="alert alert-dismissible alert-secondary">
                <p>Cuenta: {{ $venta->cuenta->nombre }} {{ $venta->cuenta->email_cuenta }} </p>
                <h5>Cliente: {{ $venta->cliente->nombre_completo }} </h5>
            </div>
        </div>

        <div class="col-12 col-sm-12 col-md-6">
            <div class="form-floating my-4">
                <input type="date" autocomplete="off" placeholder="Vencimiento" name="fecha_pago" value="{{ old('fecha_pago') ?? now() }}" required class="form-control" />
                <label>Fecha Pago</label>
            </div>
        </div>

        <div class="col-12 col-sm-12 col-md-6">
            <div class="form-floating my-4">
                <input type="date" autocomplete="off" placeholder="Vencimiento" name="vencimiento" value="{{ old('vencimiento') }}" required class="form-control" />
                <label>Vencimiento</label>
            </div>
        </div>

        <div class="col-12 col-sm-12 col-md-6">
            <button type="submit" class="btn btn-success btn-lg">Renovar</button>
        </div>
    </div>
</form>
@endsection
