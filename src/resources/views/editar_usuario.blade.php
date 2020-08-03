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
        <form action="{{ route('usuarios.update', $dados->id) }}" method="post">
            <input type="hidden" name="_method" value="PUT">
            @csrf
            <div class="row">
                <div class="col-sm-8">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome" value="{{ $dados->nome }}">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $dados->email }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Senha</label>
                        <input type="password" class="form-control" id="password" name="password" value="{{ $dados->password }}">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Permissão</label>
                        <select class="form-control" id="permissao" name="permissao" value="{{ $dados->permissao }}">
                            <option value="administrador">Administrador</option>
                            <option value="funcionario">Funcionário</option>
                        </select>
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
