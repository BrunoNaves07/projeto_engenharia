@extends('templates/template')
@section('content')

<div class="container">
    <div class="titulo-pagina">{{ $titulo }}</div>
    <div class="caixa">
        <form action="{{ route('vendas.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Funcionário</label>
                <select class="form-control" name="funcionario_id" id="exampleFormControlSelect2">
                    <option value="">Selecione o Funcionário</option>
                    @foreach ($funcionarios as $funcionario)
                    <option value="{{ $funcionario->id }}">{{ $funcionario->nome }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Clientes</label>
                <select class="form-control" name="cliente_id" id="exampleFormControlSelect2">
                    <option value="">Selecione o cliente</option>
                    @foreach ($clientes as $cliente)
                    <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                    @endforeach
                </select>
            </div>
            <div class="btn-form">
                <button type="submit" class="btn btn-primary btn-salvar">Salvar</button>
            </div>
        </form>
    </div>
</div>

@endsection
