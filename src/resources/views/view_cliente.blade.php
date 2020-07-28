@extends('templates/template')
@section('content')


<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('clientes.index') }}">Clientes</a></li>
        <li class="breadcrumb-item active" aria-current="page">Detalhes do Cliente</li>
    </ol>
</nav>

<div class="container">
    <div class="titulo-pagina">{{ $titulo }}</div>
    <div class="caixa">
        <div class="label">Nome</div>
        <div class="detalhe">{{ $dados->nome }}</div>
        <hr>
        <div class="label">CPF</div>
        <div class="detalhe">{{ $dados->cpf }}</div>
        <hr>
        <div class="label">Logradouro</div>
        <div class="detalhe">{{ $dados->logradouro }}, {{ $dados->numero }} / {{ $dados->bairro }}</div>
        <hr>
        <div class="label">Cidade / Estado</div>
        <div class="detalhe">{{ $dados->cidade }} / {{ $dados->estado }}</div>
        <hr>
        <div class="label">Telefone</div>
        <div class="detalhe">{{ $dados->telefone }}</div>
        <hr>
        <div class="label">Email</div>
        <div class="detalhe">{{ $dados->email }}</div>
        <hr>
    </div>
</div>

@endsection
