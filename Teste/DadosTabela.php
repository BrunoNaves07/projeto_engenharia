<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DadosTabela extends TestCase
{
    /**
     * Verifica se existe determinado dado
     * na tabela
     */

    // Cliente
    public function test_verifica_existe_cliente()
    {
        $this->assertDatabaseHas('clientes', [
            'nome' => 'Bruno Carlos de Mesquita Naves',
        ]);
    }

    // Usuario
    public function test_verifica_existe_usuario()
    {
        $this->assertDatabaseHas('users', [
            'nome' => 'Bruno Carlos de Mesquita Naves',
        ]);
    }

    // Funcionário
    public function test_verifica_existe_funcionario()
    {
        $this->assertDatabaseHas('funcionarios', [
            'logradouro' => 'Rua Professora Maria Madalena',
        ]);
    }

    // Autor
    public function test_verifica_existe_autor()
    {
        $this->assertDatabaseHas('autores', [
            'nome' => 'Pedro Alvares Cabral',
        ]);
    }

    // Editora
    public function test_verifica_existe_editoras()
    {
        $this->assertDatabaseHas('editoras', [
            'cnpj' => '07.105.360/0001-50',
        ]);
    }

    // Livro
    public function test_verifica_existe_livro()
    {
        $this->assertDatabaseHas('livros', [
            'titulo' => 'Como Descobri o Brasil',
        ]);
    }
}
