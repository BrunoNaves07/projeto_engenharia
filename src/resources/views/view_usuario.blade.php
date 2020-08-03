@extends('templates/template')
@section('content')


<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('usuarios.index') }}">Usuários</a></li>
        <li class="breadcrumb-item active" aria-current="page">Detalhes do Usuário</li>
    </ol>
</nav>

<div class="container">
    <div class="titulo-pagina">{{ $titulo }}</div>
    <div class="caixa">
        <div class="label">Nome</div>
        <div class="detalhe">{{ $dados->nome }}</div>
        <hr>
        <div class="label">E-mail</div>
        <div class="detalhe">{{ $dados->email }}</div>
        <hr>
        <div class="label">Permissão</div>
        <div class="detalhe">{{ $dados->permissao }}</div>
        <hr>
    </div>
</div>

@endsection
