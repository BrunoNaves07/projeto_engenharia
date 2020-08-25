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
        <form action="{{ route('clientes.update', $dados->id) }}" method="post">
            <input type="hidden" name="_method" value="PUT">
            @csrf
            <div class="row">
                <div class="col-sm-8">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nome<span style="color: red">*</span></label>
                        <input type="text" class="form-control" id="nome" name="nome" value="{{ $dados->nome }}">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">CPF<span style="color: red">*</span></label>
                        <input type="text" class="form-control" id="cpf" name="cpf" value="{{ $dados->cpf }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Logradouro<span style="color: red">*</span></label>
                        <input type="text" class="form-control" id="logradouro" name="logradouro" value="{{ $dados->logradouro }}">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Número<span style="color: red">*</span></label>
                        <input type="text" class="form-control" id="numero" name="numero" value="{{ $dados->numero }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Bairro<span style="color: red">*</span></label>
                        <input type="text" class="form-control" id="bairro" name="bairro" value="{{ $dados->bairro }}">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">CEP<span style="color: red">*</span></label>
                        <input type="text" class="form-control" id="cep" name="cep" value="{{ $dados->cep }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Cidade<span style="color: red">*</span></label>
                        <input type="text" class="form-control" id="cidade" name="cidade" value="{{ $dados->cidade }}">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Estado<span style="color: red">*</span></label>
                        <input type="text" class="form-control" id="estado" name="estado" value="{{ $dados->estado }}">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Telefone<span style="color: red">*</span></label>
                        <input type="text" class="form-control" id="telefone" name="telefone" value="{{ $dados->telefone }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email<span style="color: red">*</span></label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $dados->email }}"aria-describedby="emailHelp">
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
