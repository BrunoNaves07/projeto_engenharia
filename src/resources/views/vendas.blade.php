@extends('templates/template')
@section('content')

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
        <div class="row">
            <div class="col-sm-1">
                <a href="{{ route('vendas.create') }}"><button type="button" class="btn btn-info">Novo</button></a>
            </div>
            <div class="col-sm-11">
                <input type="text" class="form-control pesquisar" id="pesquisar" placeholder="Pesquisar">
            </div>
        </div>
        <hr>
        <table class="table" id="tabela">
        <thead>
            <tr>
            <th scope="col">Data Venda</th>
            <th scope="col">Cliente</th>
            <th scope="col">Ver</th>
            <th scope="col">Excluir</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vendas as $venda)
            <tr>
                <th scope="row">{{ date('d/m/Y', strtotime($venda->data)) }}</th>
                <td>{{ $venda->nomeCliente }}</td>
                <td><a href="{{ route('vendas.show', $venda->id) }}"><button type="button" class="btn btn-success btn-sm">Ver</button></td></a>
                <td>
                    <form action="{{ route('vendas.destroy', $venda->id)}}" method="post">
                        <input type="hidden" name="_method" value="DELETE">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
</div>


@endsection
