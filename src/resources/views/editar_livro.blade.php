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
        <form action="{{ route('livros.update', $dados->id) }}" method="post">
            <input type="hidden" name="_method" value="PUT">
            @csrf
            <div class="row">
                <div class="col-sm-8">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Título<span style="color: red">*</span></label>
                        <input type="text" class="form-control" id="titulo" name="titulo" value="{{ $dados->titulo }}">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">ISBN<span style="color: red">*</span></label>
                        <input type="text" class="form-control" id="isbn" name="isbn" value="{{ $dados->isbn }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Autor<span style="color: red">*</span></label>
                        <select class="form-control" id="autor_id" name="autor_id">
                            <option selected disabled hidden style='display: none' value=''></option>
                            @foreach ($autores->all() as $autor)
                                <option value="{{ $autor->id }}">{{ $autor->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Editora<span style="color: red">*</span></label>
                        <select class="form-control" id="editora_id" name="editora_id">
                        <option selected disabled hidden style='display: none' value=''></option>
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
                        <label for="exampleInputEmail1">Edição<span style="color: red">*</span></label>
                        <input type="text" class="form-control" id="edicao" name="edicao" value="{{ $dados->edicao }}">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Ano<span style="color: red">*</span></label>
                        <input type="text" class="form-control" id="ano" name="ano" value="{{ $dados->ano }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Preço<span style="color: red">*</span></label>
                        <input type="text" class="form-control" id="preco" name="preco" value="{{ $dados->preco }}">
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
