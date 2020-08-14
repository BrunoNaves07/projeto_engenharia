<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    protected $fillable = [
        'data',
        'total',
        'cliente_id',
        'funcionario_id',
    ];
}
