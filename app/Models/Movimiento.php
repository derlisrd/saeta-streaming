<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movimiento extends Model
{
    use HasFactory;
    protected $table = 'movimientos';
    protected $fillable = ['caja_id','descripcion','fecha','monto','tipo_movimiento'];

    public function caja(){
        return $this->belongsTo(Caja::class);
    }
}
