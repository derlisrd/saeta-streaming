@extends('Layout.app')


@section('title','Registrar Cuenta');

@section('container')

<h3>Registrar cuenta</h3>
<form method="post" action="{{ route('cuentas.store') }}">
    @csrf
<div class="card rounded">
    <div class="card-content px-4">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-6">
                <div class="form-floating mt-4">
                    <input autofocus autocomplete="off" placeholder="Nombre" name="nombre" value="{{ old('nombre') }}" required class="form-control" />
                    <label>Nombre: NETFLIX, SPOTIFY, ETC</label>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-6">
                <div class="form-floating mt-4">
                    <input autocomplete="off" type="email" placeholder="Email" name="email_cuenta" required value="{{ old('email_cuenta') }}" class="form-control" />
                    <label>Email</label>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-6">
                <div class="form-floating mt-4">
                    <input autocomplete="off" name="password" placeholder="Password" required value="{{ old('password') }}" class="form-control" />
                    <label>Contraseña</label>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-6">
                <div class="form-floating mt-4">
                    <input autocomplete="off" type="number" placeholder="Valor unitario" name="valor_unitario" required value="{{ old('valor_unitario') }}" class="form-control" />
                    <label>Valor unitario</label>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-6">
                <div class="form-floating mt-4">
                    <input autocomplete="off"  name="valor_total" id="valor_total" placeholder="Valor total" required value="{{ old('valor_total') }}" class="form-control" />
                    <label for="valor_total">Valor total</label>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-6">


                <div class="form-check mt-4">
                    <input class="form-check-input" type="radio" name="pago_status" id="pagado" value="1" checked>
                    <label role="button" class="form-check-label" for="pagado">
                      Pagado
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="pago_status" id="no_pagado" value="0">
                    <label role="button" class="form-check-label" for="no_pagado">
                      No pagado
                    </label>
                </div>

            </div>

            <div class="col-12 col-sm-12 col-md-6">
                <div class="form-floating mt-4">
                    <input autocomplete="off" type="date"  name="fecha_pago" id="fecha_pago" placeholder="Fecha de pago" required value="{{ old('fecha_pago') }}" class="form-control" />
                    <label for="fecha_pago">Fecha Pago</label>
                </div>
            </div>

            <div class="col-12 col-sm-12 col-md-6">
                <div class="form-floating mt-4">
                    <input autocomplete="off" type="date"  name="vencimiento_pago" id="vencimiento_pago" placeholder="Fecha de pago" required value="{{ old('vencimiento_pago') }}" class="form-control" />
                    <label for="vencimiento_pago">Vencimiento</label>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-6">
                <div class="form-floating mt-4">
                    <input autocomplete="off" type="tel" placeholder="Telefono" name="telefono" required value="{{ old('telefono') }}" class="form-control" />
                    <label>Telefono:</label>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-6">
                <div class="form-floating mt-4">
                    <input autocomplete="off" type="number" placeholder="Cuentas disponibles" name="cuentas_disponibles" required value="{{ old('cuentas_disponibles') }}" class="form-control" />
                    <label>Cuentas disponibles</label>
                </div>
            </div>

            <div class="col-12">
                <div class="form-group my-4">
                    <button type="submit" class="btn btn-outline-success">Registrar</button>
                </div>
            </div>
        </div>
    </div>
</div>
</form>
@endsection
