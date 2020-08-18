<?php

namespace Tests\Feature;

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
        $this->get('/clientes')->assertStatus(302);
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

}
