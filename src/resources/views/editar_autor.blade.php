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
        <form action="{{ route('autores.update', $dados->id) }}" method="post">
            <input type="hidden" name="_method" value="PUT">
            @csrf
            <div class="row">
                <div class="col-sm-8">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nome<span style="color: red">*</span></label>
                        <input type="text" class="form-control" id="nome" name="nome" value="{{ $dados->nome }}">
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Data de Nascimento<span style="color: red">*</span></label>
                        <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" value="{{ $dados->data_nascimento }}">
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
