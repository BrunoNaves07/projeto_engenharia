@extends('templates/template')
@section('content')


<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('funcionarios.index') }}">Funcionários</a></li>
        <li class="breadcrumb-item active" aria-current="page">Detalhes do Funcionário</li>
    </ol>
</nav>

<div class="container">
    <div class="titulo-pagina">{{ $titulo }}</div>
    <div class="caixa">
        <div class="label">Nome</div>
        <div class="detalhe">{{ $dados->usuario->nome }}</div>
        <hr>
        <div class="label">Cargo</div>
        <div class="detalhe">{{ $dados->cargo }}</div>
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
    </div>
</div>

@endsection
