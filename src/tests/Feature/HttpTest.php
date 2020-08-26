<?php

namespace Tests\Feature;

use Illuminate\Http\Request;
use App\Http\Controllers\AutorController;
use App\Models\Autor;
use App\Http\Requests\AutorRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HttpTest extends TestCase
{

    /**
     * Teste de requisição HTTP GET em páginas
     * com acesso restrito código de retorno 302
     */

    // Login
    public function test_acesso_login()
    {
        $this->get('/login')->assertStatus(200);
    }

    // Funcionários
    public function test_acesso_funcionarios()
    {
        $this->get('/funcionarios')->assertStatus(302);
    }

    // Clientes
    public function test_acesso_clientes()
    {
        $this->get('/clientes')->assertStatus(200);
    }

    // Livros
    public function test_acesso_livros()
    {
        $this->get('/livros')->assertStatus(302);
    }

    // Editoras
    public function test_acesso_editoras()
    {
        $this->get('/editoras')->assertStatus(302);
    }

    // Autores
    public function test_acesso_autores()
    {
        $this->get('/autores')->assertStatus(302);
    }

    // Usuarios
    public function test_acesso_usuarios()
    {
        $this->get('/usuarios')->assertStatus(302);
    }

    // Vendas
    public function test_acesso_vendas()
    {
        $this->get('/vendas')->assertStatus(302);
    }

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
