<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Editora;

class EditoraController extends Controller
{

    private $editora;

    /**
     * Construtor
     */
    public function __construct(Editora $editora) {
        $this->editora = $editora;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $titulo = "Editoras";
        $editoras = $this->editora->get();
        return view('editoras', compact('titulo', 'editoras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $titulo = "Cadastrar Editora";
        return view('criar_editora', compact('titulo'));
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

        $insert = $this->editora->create($dados);

        if ($insert) {
            return redirect('editoras');
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
        $titulo = "Detalhes da Editora";
        $dados = $this->editora->find($id);
        return view('view_editora', compact('titulo', 'dados'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $titulo = "Editar Editora";
        $dados = $this->editora->find($id);
        return view('editar_editora', compact('titulo', 'dados'));
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

        $find = $this->editora->find($id);

        $update = $find->update($dados);

        if ($update) {
            return redirect('editoras');
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
        $find = $this->editora->find($id);

        $delete = $find->delete();

        if ($delete) {
            return redirect('editoras');
        } else {
            return redirect()->back()->withErrors("Erro ao Deletar Registro");
        }
    }
}
