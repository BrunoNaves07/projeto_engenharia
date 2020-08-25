@extends('templates/template')
@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('editoras.index') }}">Editoras</a></li>
        <li class="breadcrumb-item active" aria-current="page">Detalhes da Editora</li>
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
        <form action="{{ route('editoras.store') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-sm-8">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nome<span style="color: red">*</span></label>
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome Completo">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">CNPJ<span style="color: red">*</span></label>
                        <input type="text" class="form-control" id="cnpj" name="cnpj" placeholder="00.000.000/0000-00">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Logradouro<span style="color: red">*</span></label>
                        <input type="text" class="form-control" id="logradouro" name="logradouro" placeholder="Rua, Avenida, Praça">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Número<span style="color: red">*</span></label>
                        <input type="text" class="form-control" id="numero" name="numero" placeholder="0000 A">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Bairro<span style="color: red">*</span></label>
                        <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Nome do Bairro">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">CEP<span style="color: red">*</span></label>
                        <input type="text" class="form-control" id="cep" name="cep" placeholder="00.000-000">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Cidade<span style="color: red">*</span></label>
                        <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Cidade">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Estado<span style="color: red">*</span></label>
                        <input type="text" class="form-control" id="estado" name="estado" placeholder="Estado">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Telefone<span style="color: red">*</span></label>
                        <input type="text" class="form-control" id="telefone" name="telefone" placeholder="(00) 0000-0000">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email<span style="color: red">*</span></label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="email@email.com.br" aria-describedby="emailHelp">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Site</label>
                        <input type="text" class="form-control" id="site" name="site" placeholder="Site">
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
