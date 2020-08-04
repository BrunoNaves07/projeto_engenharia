@extends('templates/template')
@section('content')


<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('livros.index') }}">Livros</a></li>
        <li class="breadcrumb-item active" aria-current="page">Detalhes do Livro</li>
    </ol>
</nav>

<div class="container">
    <div class="titulo-pagina">{{ $titulo }}</div>
    <div class="caixa">
        <div class="label">Título</div>
        <div class="detalhe">{{ $dados->titulo }}</div>
        <hr>
        <div class="label">Autor</div>
        <div class="detalhe">{{ $dados->autor->nome}}</div>
        <hr>
        <div class="label">Editora</div>
        <div class="detalhe">{{ $dados->editora->nome }}</div>
        <hr>
        <div class="label">ISBN</div>
        <div class="detalhe">{{ $dados->isbn }}</div>
        <hr>
        <div class="label">Edição</div>
        <div class="detalhe">{{ $dados->edicao }}</div>
        <hr>
        <div class="label">Ano</div>
        <div class="detalhe">{{ $dados->ano }}</div>
        <hr>
        <div class="label">Preço</div>
        <div class="detalhe">{{ $dados->preco }}</div>
        <hr>
    </div>
</div>

@endsection
