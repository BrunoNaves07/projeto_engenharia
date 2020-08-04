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
        <form action="{{ route('funcionarios.store') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-sm-8">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nome</label>
                        <select class="form-control" id="user_id" name="user_id">
                            <option selected disabled hidden style='display: none' value=''></option>
                            @foreach ($usuarios->all() as $usuario)
                                <option value="{{ $usuario->id }}">{{ $usuario->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Cargo</label>
                        <input type="text" class="form-control" id="cargo" name="cargo" placeholder="Balconista">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Logradouro</label>
                        <input type="text" class="form-control" id="logradouro" name="logradouro" placeholder="Rua, Avenida, Praça">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Número</label>
                        <input type="text" class="form-control" id="numero" name="numero" placeholder="0000 A">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Bairro</label>
                        <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Nome do Bairro">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">CEP</label>
                        <input type="text" class="form-control" id="cep" name="cep" placeholder="00.000-000">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Cidade</label>
                        <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Cidade">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Estado</label>
                        <input type="text" class="form-control" id="estado" name="estado" placeholder="Estado">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Telefone</label>
                        <input type="text" class="form-control" id="telefone" name="telefone" placeholder="(00) 0000-0000">
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
