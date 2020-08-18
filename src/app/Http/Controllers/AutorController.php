<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Autor;

class AutorController extends Controller
{
    private $autor;

    /**
     * Construtor
     */
    public function __construct(Autor $autor) {
        $this->middleware('auth');
        $this->autor = $autor;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $titulo = "Autores";
        $autores = $this->autor->get();
        return view('autores', compact('titulo', 'autores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $titulo = "Cadastrar Autor";
        return view('criar_autor', compact('titulo'));
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
            'nome'                   => $request->nome,
            'data_nascimento'        => $request->data_nascimento,
        ];

        $insert = $this->autor->create($dados);

        if ($insert) {
            return redirect('autores');
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
        $titulo = "Detalhes do Autor";
        $dados = $this->autor->find($id);
        return view('view_autor', compact('titulo', 'dados'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $titulo = "Editar Autor";
        $dados = $this->autor->find($id);
        return view('editar_autor', compact('titulo', 'dados'));
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
            'nome'                   => $request->nome,
            'data_nascimento'        => $request->data_nascimento,
        ];

        $find = $this->autor->find($id);

        $update = $find->update($dados);

        if ($update) {
            return redirect('autores');
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
        $find = $this->autor->find($id);

        $delete = $find->delete();

        if ($delete) {
            return redirect('autores');
        } else {
            return redirect()->back()->withErrors("Erro ao Deletar Registro");
        }
    }
}
