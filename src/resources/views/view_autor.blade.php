@extends('templates/template')
@section('content')


<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('autores.index') }}">Autores</a></li>
        <li class="breadcrumb-item active" aria-current="page">Detalhes do Autor</li>
    </ol>
</nav>

<div class="container">
    <div class="titulo-pagina">{{ $titulo }}</div>
    <div class="caixa">
        <div class="label">Nome</div>
        <div class="detalhe">{{ $dados->nome }}</div>
        <hr>
        <div class="label">CPF</div>
        <div class="detalhe">{{ $dados->data_nascimento }}</div>
        <hr>
    </div>
</div>

@endsection
