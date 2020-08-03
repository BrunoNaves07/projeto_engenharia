<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    private $usuario;

    /**
     * Construtor
     */
    public function __construct(Usuario $usuario) {
        $this->usuario = $usuario;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $titulo = "Usuários";
        $usuarios = $this->usuario->get();
        return view('usuarios', compact('titulo', 'usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $titulo = "Cadastrar Usuário";
        return view('criar_usuario', compact('titulo'));
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
            'nome'         => $request->nome,
            'email'        => $request->email,
            'password'     => $request->password,
            'permissao'    => $request->permissao,
        ];

        $insert = $this->usuario->create($dados);

        if ($insert) {
            return redirect('usuarios');
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
        $titulo = "Detalhes do Usuário";
        $dados = $this->usuario->find($id);
        return view('view_usuario', compact('titulo', 'dados'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $titulo = "Editar Usuário";
        $dados = $this->usuario->find($id);
        return view('editar_usuario', compact('titulo', 'dados'));
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
            'nome'         => $request->nome,
            'email'        => $request->email,
            'password'     => $request->password,
            'permissao'    => $request->permissao,
        ];

        $find = $this->usuario->find($id);

        $update = $find->update($dados);

        if ($update) {
            return redirect('usuarios');
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
        $find = $this->usuario->find($id);

        $delete = $find->delete();

        if ($delete) {
            return redirect('usuarios');
        } else {
            return redirect()->back()->withErrors("Erro ao Deletar Registro");
        }
    }
}
