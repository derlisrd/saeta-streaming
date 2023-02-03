@extends('Layout.app')


@section('title','Editar Venta');

@section('container')


<form method="post" action="{{ route('ventas.update',request()->id) }}">
@csrf
@method('put')
<div class="row">
    <div class="col-12">
        <h3 class="mt-5">Editar venta</h3>
    </div>
    <div class="col-12 col-sm-12 col-md-6">

    </div>
    <div class="col-12 col-sm-12 col-md-6">

    </div>



    <div class="col-12 col-sm-12 col-md-3">
        <div class="form-floating my-4">
            <input type="date" autocomplete="off" placeholder="Vencimiento" name="fecha_pago" value="{{ old('fecha_pago') ?? $venta->fecha_pago }}" required class="form-control" />
            <label>Fecha Pago</label>
        </div>
    </div>

    <div class="col-12 col-sm-12 col-md-3">
        <div class="form-floating my-4">
            <input type="date" autocomplete="off" placeholder="Vencimiento" name="vencimiento" value="{{ old('vencimiento') ?? $venta->vencimiento }}" required class="form-control" />
            <label>Vencimiento</label>
        </div>
    </div>



    <div class="col-12 col-sm-12 col-md-3">
        <div class="form-floating my-4">
            <input type="text" autocomplete="off" placeholder="PIN" name="pin_cuenta" value="{{ old('pin_cuenta') ?? $venta->pin_cuenta }}" required class="form-control" />
            <label>PIN</label>
        </div>
    </div>

    <div class="col-12 col-sm-12 col-md-3">
        <div class="form-floating my-4">
            <input type="text" autocomplete="off" placeholder="Referencia" name="ref" value="{{ old('ref') ?? $venta->ref }}" class="form-control" />
            <label>Referencia u obs</label>
        </div>
    </div>




    <div class="col-12 col-sm-12 col-md-6">
        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-lg btn-success" type="button">Actualizar</button>
        </div>
    </div>


</div>

</form>
@endsection
