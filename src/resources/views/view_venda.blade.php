@extends('templates/template')
@section('content')
<div class="container">
    <div class="titulo-pagina">{{ $titulo }}</div>
    <div class="caixa">
        <div class="dados-venda"><strong>Cliente: </strong>{{ $dadosVenda[0]->nomeCliente }}</div>
        <div class="dados-venda"><strong>Data da Venda: </strong>{{ date('d/m/Y', strtotime($dadosVenda[0]->data)) }}</div>
        <div class="dados-venda"><strong>Total: </strong>{{ $totalVendas[0]->total }}</div>
        <div class="dados-venda"><strong>Funcionário resposável: </strong>{{ $dadosVenda[0]->nomeFuncionario }}</div>
        <hr>
        <div class="dados-venda"><strong>Itens</strong></div>
        @foreach($itens as $item)
        <div class="dados-venda">{{ $item->titulo }} / {{ $item->editora }} / {{ $item->preco }}</div>
        @endforeach
    </div>
</div>
@endsection
