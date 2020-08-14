<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Autor;
use App\Models\Editora;
use App\Models\Funcionario;
use App\Models\Livro;
use App\Models\Venda;
use App\Models\Usuario;

class RealizarVendaController extends Controller
{
    private $cliente;
    private $autor;
    private $editora;
    private $funcionario;
    private $livro;
    private $venda;
    private $usuario;

    /**
     * Construtor Padrão
     */
    public function __construct(Venda $venda, Cliente $cliente, Autor $autor, Editora $editora, Funcionario $funcionario, Usuario $usuario, Livro $livro)
    {
        $this->venda = $venda;
        $this->cliente = $cliente;
        $this->autor = $autor;
        $this->editora = $editora;
        $this->funcionario = $funcionario;
        $this->usuario = $usuario;
        $this->livro = $livro;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
