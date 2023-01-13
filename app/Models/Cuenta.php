<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre','email_cuenta','valor_unitario','valor_total','password','fecha_pago','vencimiento_pago','pago_status','cuentas_disponibles'
    ];
}
