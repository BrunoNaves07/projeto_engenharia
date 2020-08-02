<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Editora extends Model
{
    protected $table = 'editoras';

    protected $fillable = [
        'nome',
        'cnpj',
        'logradouro',
        'numero',
        'bairro',
        'cep',
        'cidade',
        'estado',
        'telefone',
        'email',
        'site',
    ];
}
