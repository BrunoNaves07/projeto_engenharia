<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livro;
use App\Models\Autor;
use App\Models\Editora;

class LivroController extends Controller
{

    private $livro;

    /**
     * Construtor
     */
    public function __construct(Livro $livro) {
        $this->livro = $livro;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $titulo = "Livros";
        $livros = $this->livro->get();
        return view('livros', compact('titulo', 'livros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $autores = Autor::select('id', 'nome')->get();
        $editoras = Editora::select('id', 'nome')->get();
        $titulo = "Cadastrar Livro";
        return view('criar_livro', compact('titulo','autores','editoras'));
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
            'ano'        => $request->ano,
            'edicao'     => $request->edicao,
            'isbn'       => $request->isbn,
            'preco'      => $request->preco,
            'titulo'     => $request->titulo,
            'autor_id'   => $request->autor_id,
            'editora_id' => $request->editora_id,
        ];

        $insert = $this->livro->create($dados);

        if ($insert) {
            return redirect('livros');
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
        $titulo = "Detalhes da livro";
        $dados = $this->livro->find($id);
        return view('view_livro', compact('titulo', 'dados'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $autores = Autor::select('id', 'nome')->get();
        $editoras = Editora::select('id', 'nome')->get();
        $titulo = "Editar Livro";
        $dados = $this->livro->find($id);
        return view('editar_livro', compact('titulo', 'dados', 'autores','editoras'));
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
            'ano'        => $request->ano,
            'edicao'     => $request->edicao,
            'isbn'       => $request->isbn,
            'preco'      => $request->preco,
            'titulo'     => $request->titulo,
            'autor_id'   => $request->autor_id,
            'editora_id' => $request->editora_id,
        ];

        $find = $this->livro->find($id);

        $update = $find->update($dados);

        if ($update) {
            return redirect('livros');
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
        $find = $this->livro->find($id);

        $delete = $find->delete();

        if ($delete) {
            return redirect('livros');
        } else {
            return redirect()->back()->withErrors("Erro ao Deletar Registro");
        }
    }
}
