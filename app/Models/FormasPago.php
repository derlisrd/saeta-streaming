<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormasPago extends Model
{
    use HasFactory;

    protected $table = 'formas_pagos';
    protected $fillable = ['metodo'];
}
