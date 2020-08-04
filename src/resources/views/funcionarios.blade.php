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
                <a href="{{ route('funcionarios.create') }}"><button type="button" class="btn btn-info">Novo</button></a>
            </div>
            <div class="col-sm-11">
                <input type="text" class="form-control pesquisar" id="pesquisar" placeholder="Pesquisar">
            </div>
        </div>
        <hr>
        <table class="table" id="tabela">
        <thead>
            <tr>
            <th scope="col">Nome</th>
            <th scope="col">Cargo</th>
            <th scope="col">Ver</th>
            <th scope="col">Editar</th>
            <th scope="col">Excluir</th>
            </tr>
        </thead>
        <tbody>
            @foreach($funcionarios as $funcionario)
            <tr>
                <th scope="row">{{ $funcionario->usuario->nome }}</th>
                <td>{{ $funcionario->cargo }}</td>
                <td><a href="{{ route('funcionarios.show', $funcionario->id) }}"><button type="button" class="btn btn-success btn-sm">Ver</button></td></a>
                <td><a href="{{ route('funcionarios.edit', $funcionario->id) }}"><button type="button" class="btn btn-primary btn-sm">Editar</button></td></a>
                <td>
                    <form action="{{ route('funcionarios.destroy', $funcionario->id) }}" method="post">
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

<script>
$(document).ready(function () {
    $("#pesquisar").on("keyup", function () {
        var value = $(this).val().toLowerCase();
        $("#tabela tr").filter(function () {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});
</script>

@endsection
