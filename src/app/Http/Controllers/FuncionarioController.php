<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Funcionario;
use App\Http\Requests\FuncionarioRequest;
use Illuminate\Support\Facades\DB;

class FuncionarioController extends Controller
{

    private $funcionario;

    /**
     * Construtor
     */
    public function __construct(Funcionario $funcionario) {
        $this->middleware('auth');
        $this->funcionario = $funcionario;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $titulo = "Funcionários";
        $funcionarios = $this->funcionario->get();
        return view('funcionarios', compact('titulo', 'funcionarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        #lista apenas os usuarios sem correspondência na tabela de funcionarios
        #isto garante que nao se tente relacionar o mesmo funcionario duas vezes
        $usuarios = DB::table('users')
                    ->leftJoin('funcionarios','users.id','=','funcionarios.user_id')
                    ->whereRaw('funcionarios.user_id is null')
                    ->select('users.id','users.nome')
                    ->get();
        $titulo = "Cadastrar Funcionário";
        return view('criar_funcionario', compact('titulo', 'usuarios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FuncionarioRequest $request)
    {
        //dd($request);
        $dados = [
            'cargo'              => $request->cargo,
            'logradouro'         => $request->logradouro,
            'numero'             => $request->numero,
            'bairro'             => $request->bairro,
            'cep'                => $request->cep,
            'cidade'             => $request->cidade,
            'estado'             => $request->estado,
            'telefone'           => $request->telefone,
            'user_id'            => $request->user_id,
        ];

        $insert = $this->funcionario->create($dados);

        if ($insert) {
            return redirect('funcionarios');
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
        $titulo = "Detalhes do Funcionário";
        $dados = $this->funcionario->find($id);
        return view('view_funcionario', compact('titulo', 'dados'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $titulo = "Editar Funcionário";
        $dados = $this->funcionario->find($id);
        return view('editar_funcionario', compact('titulo', 'dados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FuncionarioRequest $request, $id)
    {
        $dados = [
            'cargo'              => $request->cargo,
            'logradouro'         => $request->logradouro,
            'numero'             => $request->numero,
            'bairro'             => $request->bairro,
            'cep'                => $request->cep,
            'cidade'             => $request->cidade,
            'estado'             => $request->estado,
            'telefone'           => $request->telefone,
            'user_id'            => $request->user_id,
        ];

        $find = $this->funcionario->find($id);

        $update = $find->update($dados);

        if ($update) {
            return redirect('funcionarios');
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
        $find = $this->funcionario->find($id);

        $delete = $find->delete();

        if ($delete) {
            return redirect('funcionarios');
        } else {
            return redirect()->back()->withErrors("Erro ao Deletar Registro");
        }
    }
}
