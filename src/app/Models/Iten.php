<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Iten extends Model
{
    protected $fillable = [
        'venda_id',
        'livro_id',
    ];
}
