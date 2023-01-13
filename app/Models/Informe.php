<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informe extends Model
{
    use HasFactory;

    protected $fillable = [
        'venta_id','valor'
    ];

    public function venta(){
        return $this->belongsTo(Venta::class);
    }
}
