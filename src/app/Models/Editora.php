<?php

namespace App\Models;

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

    /**
     * Relacionamento de autor com livros.
     */
    public function livros()
    {
        return $this->hasMany('App\Models\Livro');
    }
}
