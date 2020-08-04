<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $fillable = [
        'cargo',
        'logradouro',
        'numero',
        'bairro',
        'cep',
        'cidade',
        'estado',
        'telefone',
        'user_id',
    ];

    /**
     * Relacionamento de funcionario com usuario.
     */
    public function usuario()
    {
        return $this->belongsTo('App\Models\Usuario', 'user_id');
    }
}
