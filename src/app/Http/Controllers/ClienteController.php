<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{

    private $cliente;

    /**
     * Construtor
     */
    public function __construct(Cliente $cliente) {
        //$this->middleware('auth');
        $this->cliente = $cliente;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $titulo = "Clientes";
        $clientes = $this->cliente->get();
        return view('clientes', compact('titulo', 'clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $titulo = "Cadastrar Cliente";
        return view('criar_cliente', compact('titulo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $dados = [
            'nome'       => $request->nome,
            'cpf'        => $request->cpf,
            'logradouro' => $request->logradouro,
            'numero'     => $request->numero,
            'bairro'     => $request->bairro,
            'cep'        => $request->cep,
            'cidade'     => $request->cidade,
            'estado'     => $request->estado,
            'telefone'   => $request->telefone,
            'email'      => $request->email,
        ];

        $insert = $this->cliente->create($dados);

        if ($insert) {
            return redirect('clientes');
        } else {
            return redirect()->back()->withErrors('Erro ao inserir Registro!');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $titulo = "Detalhes do Cliente";
        $dados = $this->cliente->find($id);
        return view('view_cliente', compact('titulo', 'dados'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $titulo = "Editar Cliente";
        $dados = $this->cliente->find($id);
        return view('editar_cliente', compact('titulo', 'dados'));
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
        $dados = [
            'nome'       => $request->nome,
            'cpf'        => $request->cpf,
            'logradouro' => $request->logradouro,
            'numero'     => $request->numero,
            'bairro'     => $request->bairro,
            'cep'        => $request->cep,
            'cidade'     => $request->cidade,
            'estado'     => $request->estado,
            'telefone'   => $request->telefone,
            'email'      => $request->email,
        ];

        $find = $this->cliente->find($id);

        $update = $find->update($dados);

        if ($update) {
            return redirect('clientes');
        } else {
            return redirect()->back()->withErrors('Erro ao Editar Registro!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $find = $this->cliente->find($id);

        $delete = $find->delete();

        if ($delete) {
            return redirect('clientes');
        } else {
            return redirect()->back()->withErrors("Erro ao Deletar Registro");
        }
    }
}
