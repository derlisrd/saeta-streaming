@extends('Layout.app')


@section('title','Pagar Cuenta');

@section('container')

<h3>Pagar cuenta</h3>
<h3>

</h3>
<form method="post" action="{{ route('cuentas.pagar.store') }}">
    <input type="hidden" name="cuenta_id" value="{{ request()->id }}" />
    @csrf
    <div class="row">
        <div class="col-12 col-sm-12 col-md-6">
            <div class="form-floating mt-4">
                <input autofocus autocomplete="off" id="monto" id="monto" placeholder="Monto" name="monto" value="{{ old('monto') }}" required class="form-control" />
                <label for="monto">Monto: </label>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-6">
            <div class="form-floating mt-4">
                <select class="form-select my-4" name="caja_id" id="caja_id">
                    <option value="" disabled>Elija un caja por favor</option>
                    @foreach ($cajas as $c)
                    <option value="{{ $c->id }}">{{ $c->nombre }}</option>
                    @endforeach
                </select>
                <label for="caja_id">Seleccione caja: </label>
            </div>
        </div>

        <div class="col-12 col-sm-12 col-md-6">
            <div class="form-floating mt-4">
                <input  id="fecha_pago" placeholder="Fecha de pago" id="fecha_pago" type="date" name="fecha_pago" value="{{ old('fecha_pago') }}" required class="form-control" />
                <label for="fecha_pago">Fecha pago: </label>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-6">
            <div class="form-floating mt-4">
                <input  id="vencimiento_pago" placeholder="Fecha de pago" type="date" name="vencimiento_pago" value="{{ old('vencimiento_pago') }}" required class="form-control" />
                <label for="vencimiento_pago">Vencimiento: </label>
            </div>
        </div>



        <div class="col-12">
            <button type="submit" class="btn btn-success btn-lg my-4">Pagar</button>
        </div>
    </div>
</form>

@endsection
