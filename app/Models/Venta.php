<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    protected $fillable = [
        'cuenta_id','cliente_id',
        'pago','status_pago','vencimiento','fecha_pago'
    ];

    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }

    public function cuenta(){
        return $this->belongsTo(Cuenta::class);
    }
}
