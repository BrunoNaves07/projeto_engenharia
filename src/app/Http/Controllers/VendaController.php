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
use App\Models\Iten;
use Illuminate\Support\Facades\DB;

class VendaController extends Controller
{

    private $cliente;
    private $funcionario;
    private $livro;
    private $venda;
    private $item;

    /**
     * Construtor Padrão
     */
    public function __construct(Venda $venda, Cliente $cliente, Autor $autor, Editora $editora, Funcionario $funcionario, Usuario $usuario, Livro $livro, Iten $item)
    {
        $this->middleware('auth');
        $this->venda = $venda;
        $this->cliente = $cliente;
        $this->autor = $autor;
        $this->editora = $editora;
        $this->funcionario = $funcionario;
        $this->usuario = $usuario;
        $this->livro = $livro;
        $this->item = $item;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $titulo = "Vendas";
        $vendas = $this->venda
                      ->join('funcionarios as F', 'vendas.funcionario_id', '=', 'F.id')
                      ->join('clientes as C', 'vendas.cliente_id', '=', 'C.id')
                      ->join('users as U', 'F.user_id', '=', 'U.id')
                      ->select('vendas.*', 'U.nome as nomeFuncionario', 'C.nome as nomeCliente')
                      ->get();
        return view('vendas', compact('titulo', 'vendas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $titulo = "Lançar Venda";
        // Lista de Clientes
        $clientes = $this->cliente->get();
        // Lista de Funcionários
        $funcionarios = $this->funcionario
                        ->join('users', 'funcionarios.user_id', '=', 'users.id')
                        ->select('funcionarios.*', 'users.*')
                        ->get();

        return view('abrir_venda', compact('titulo', 'clientes', 'funcionarios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $idCliente = $request->cliente_id;
        $idFuncionario = $request->funcionario_id;
        $data = date('Y-m-d');

        $dados = [
            'data' => $data,
            'cliente_id' => $idCliente,
            'funcionario_id' => $idFuncionario,
        ];

        $insert = $this->venda->create($dados);
        //dd($insert->id);

        if ($insert) {
            return redirect()->route('vendas.edit', [$insert->id]);
        } else {
            return redirect()->back()->withErrors('Erro ao iniciar uma venda');
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
        $titulo = "Detalhes da Venda";
        $dadosVenda = $this->venda
                      ->join('funcionarios as F', 'vendas.funcionario_id', '=', 'F.id')
                      ->join('clientes as C', 'vendas.cliente_id', '=', 'C.id')
                      ->join('users as U', 'F.user_id', '=', 'U.id')
                      ->select('vendas.*', 'U.nome as nomeFuncionario', 'C.nome as nomeCliente')
                      ->where('vendas.id', '=', $id)
                      ->get();

        $totalVendas = $this->item
                       ->join('livros as L', 'itens.livro_id', '=', 'L.id')
                       ->select(DB::raw('SUM(preco) as total'))
                       ->where('venda_id', '=', $id)
                       ->get();

        $itens = $this->item
                       ->join('livros as L', 'itens.livro_id', '=', 'L.id')
                       ->join('editoras as E', 'L.editora_id', '=', 'E.id')
                       ->select('L.titulo', 'L.preco', 'E.nome as editora')
                       ->where('itens.venda_id', '=', $id)->get();

        return view('view_venda', compact('titulo', 'dadosVenda', 'totalVendas', 'itens'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $titulo = "Realizar venda";
        $dadosVenda = $this->venda
                      ->join('funcionarios as F', 'vendas.funcionario_id', '=', 'F.id')
                      ->join('clientes as C', 'vendas.cliente_id', '=', 'C.id')
                      ->join('users as U', 'F.user_id', '=', 'U.id')
                      ->select('vendas.*', 'U.nome as nomeFuncionario', 'C.nome as nomeCliente')
                      ->where('vendas.id', '=', $id)
                      ->get();
        $livros = $this->livro->get();
        $itens = $this->item
                ->join('livros as L', 'itens.livro_id', '=', 'L.id')
                ->join('editoras as E', 'L.editora_id', '=', 'E.id')
                ->select('L.titulo', 'L.preco', 'E.nome as editora')
                ->where('itens.venda_id', '=', $id)->get();

        return view('criar_venda', compact('titulo', 'dadosVenda', 'livros', 'itens'));
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
            'total' => $request->valor,
        ];

        $buscaVenda = $this->venda->find($id);
        $update = $buscaVenda->update($dados);

        if ($update) {
            return redirect('vendas');
        } else {
            return redirect()->back()->withErrors("Erro ao finalizar a Venda!");
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
        $buscaVenda = $this->venda->find($id);

        $delete = $buscaVenda->delete();

        if ($delete) {
            return redirect('vendas');
        } else {
            return redirect()->back()->withErrors("Erro ao Deletar Venda!");
        }
    }
}
