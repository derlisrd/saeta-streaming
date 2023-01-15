@extends('Layout.app')


@section('title','Registrar Venta');

@section('container')


<form method="post" action="{{ route('ventas.store') }}">
@csrf

<div class="row">
    <div class="col-12">
        <h3 class="mt-5">Registrar Venta</h3>
    </div>
    <div class="col-12 col-sm-12 col-md-6">
        @error('cliente_id')
        <div class="alert alert-dismissible alert-danger">
            Ingrese un cliente
        </div>
        @enderror
        @livewire('search.clientes')
    </div>
    <div class="col-12 col-sm-12 col-md-6">
        @error('cuenta_id')
        <div class="alert alert-dismissible alert-warning">
            Ingrese una cuenta
        </div>
        @enderror
        @livewire('search.cuentas')
    </div>

    <div class="col-12 col-sm-12 col-md-6">
        <div class="form-floating my-4">
            <input type="number" autocomplete="off" placeholder="Cantidad abonada" name="pago" value="{{ old('pago') }}" required class="form-control" />
            <label>Cantidad abonada</label>
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
        <div class="form-check mt-4">
            <input class="form-check-input" type="radio" name="status_pago" id="pagado" value="1" checked>
            <label role="button" class="form-check-label" for="pagado">
              Pagado
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="status_pago" id="no_pagado" value="0">
            <label role="button" class="form-check-label" for="no_pagado">
              No pagado
            </label>
        </div>
    </div>

    <div class="col-12 col-sm-12 col-md-6">
        <div class="form-floating my-4">
            <input type="text" autocomplete="off" placeholder="PIN" name="pin_cuenta" value="{{ old('pin_cuenta') }}" required class="form-control" />
            <label>PIN</label>
        </div>
    </div>
    <div class="col-12 col-sm-12 col-md-3">
        <div class="form-group">
            <select class="form-select my-4" name="forma_pago" id="forma_pago">
              @foreach ($formas as $f)
              <option value="{{ $f->id }}">{{ $f->metodo }}</option>
              @endforeach
            </select>
          </div>
    </div>
    <div class="col-12 col-sm-12 col-md-3">
        <div class="form-floating my-4">
            <input type="text" autocomplete="off" placeholder="Referencia" name="ref" value="{{ old('ref') }}" required class="form-control" />
            <label>Referencia u obs</label>
        </div>
    </div>

    <div class="col-12 col-sm-12 col-md-6">
        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-lg btn-success" type="button">Registrar venta</button>
        </div>
    </div>


</div>

</form>
@endsection
