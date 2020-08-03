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
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="caixa">
        <form action="{{ route('livros.store') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-sm-8">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Título</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">ISBN</label>
                        <input type="text" class="form-control" id="isbn" name="isbn">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Autor</label>
                        <select class="form-control" id="autor_id" name="autor_id">
                            @foreach ($autores->all() as $autor)
                                <option value="{{ $autor->id }}">{{ $autor->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Editora</label>
                        <select class="form-control" id="editora_id" name="editora_id">
                            @foreach ($editoras->all() as $editora)
                                <option value="{{ $editora->id }}">{{ $editora->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Edição</label>
                        <input type="text" class="form-control" id="edicao" name="edicao" placeholder="Edição">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Ano</label>
                        <input type="text" class="form-control" id="ano" name="ano" placeholder="Ano">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Preço</label>
                        <input type="text" class="form-control" id="preco" name="preco" placeholder="Preço">
                    </div>
                </div>
            </div>
            <div class="btn-form">
                <button type="submit" class="btn btn-primary btn-salvar">Salvar</button>
            </div>
        </form>
    </div>
</div>

@endsection
