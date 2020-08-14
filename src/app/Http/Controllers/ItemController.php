<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Iten;

class ItemController extends Controller
{
    private $item;

    /**
     * Construtor Padrão
     */
    public function __construct(Iten $item)
    {
        $this->item = $item;
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
        if ($request->livro_id == null ) {
            return redirect()->back()->withErrors("Inserir Livro!");
        } else {

            $idVenda = $request->venda_id;
            $dados = [
                'venda_id' => $request->venda_id,
                'livro_id' => $request->livro_id,
            ];

            $insert = $this->item->create($dados);

            if ($insert) {
                return redirect()->route('vendas.edit', [$idVenda]);
            } else {
                return redirect()->back()->withErrors("Erro ao inserir Item!");
            }
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
