@extends('templates/template')
@section('content')

<div class="container">
    <div class="caixa">
        <div class="row">
            <div class="col-sm-1">
                <button type="button" class="btn btn-info">Novo</button>
            </div>
            <div class="col-sm-11">
                <input type="text" class="form-control" id="pesquisar" placeholder="Pesquisar">
            </div>
        </div>
        <hr>
        <table class="table">
        <thead>
            <tr>
            <th scope="col">Nome</th>
            <th scope="col">CPF</th>
            <th scope="col">Ver</th>
            <th scope="col">Editar</th>
            <th scope="col">Excluir</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">Bruno Carlos de Mesquita Naves</th>
                <td>085.105.316-50</td>
                <td><button type="button" class="btn btn-success btn-sm">Ver</button></td>
                <td><button type="button" class="btn btn-primary btn-sm">Editar</button></td>
                <td><button type="button" class="btn btn-danger btn-sm">Excluir</button></td>
            </tr>
        </tbody>
        </table>
    </div>
</div>

@endsection