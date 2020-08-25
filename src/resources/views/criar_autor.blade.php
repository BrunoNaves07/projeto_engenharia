@extends('templates/template')
@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('autores.index') }}">autores</a></li>
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
        <form action="{{ route('autores.store') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-sm-8">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nome <span style="color: red">*</span></label>
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome Completo">
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Data de nascimento <span style="color: red">*</span></label>
                        <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" placeholder="00/00/0000">
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
