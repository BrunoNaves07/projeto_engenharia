<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{    
    protected $table = 'livros';

    protected $fillable = [
        'ano',
        'edicao',
        'isbn',
        'preco',
        'titulo',
        'autor_id',
        'editora_id',
    ];

    /**
     * Relacionamento de livro com autor.
     */
    public function autor()
    {
        return $this->belongsTo('App\Models\Autor', 'autor_id');
    }

    /**
     * Relacionamento de livro com editora.
     */
    public function editora()
    {
        return $this->belongsTo('App\Models\Editora', 'editora_id');
    }
}
