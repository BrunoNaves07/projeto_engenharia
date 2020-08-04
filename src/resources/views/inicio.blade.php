@extends('templates/template')
@section('content')
<div class="container-fluid">
    <div class="caixa">
        <div class="titulo-inicio"><span class="material-icons" id="align-icon">menu</span> Menu Sistema</div>
        <hr>
        <div class="row">
            <div class="col">
                <a class="link-menu" href="{{ url('/usuarios') }}">
                    <div class="campo-menu">
                        <div class="icone-menu"><span class="material-icons size-icone-menu" id="align-icon">person_add_alt_1</span></div>
                        <div class="titulo-menu">Usuários</div>
                    </div>
                </a>
            </div>
            <div class="col">
                <a class="link-menu" href="{{ url('/funcionarios') }}">
                    <div class="campo-menu">
                        <div class="icone-menu"><span class="material-icons size-icone-menu" id="align-icon">people</span></div>
                        <div class="titulo-menu">Funcionário</div>
                    </div>
                </a>
            </div>
            <div class="col">
                <a class="link-menu" href="{{ url('/clientes') }}">
                    <div class="campo-menu">
                        <div class="icone-menu"><span class="material-icons size-icone-menu" id="align-icon">person</span></div>
                        <div class="titulo-menu">Clientes</div>
                    </div>
                </a>
            </div>
            <div class="col">
                <a class="link-menu" href="{{ url('/livros') }}">
                    <div class="campo-menu">
                        <div class="icone-menu"><span class="material-icons size-icone-menu" id="align-icon">menu_book</span></div>
                        <div class="titulo-menu">Livros</div>
                    </div>
                </a>
            </div>
            <div class="col">
                <a class="link-menu" href="{{ url('/editoras') }}">
                    <div class="campo-menu">
                        <div class="icone-menu"><span class="material-icons size-icone-menu" id="align-icon">apartment</span></div>
                        <div class="titulo-menu">Editoras</div>
                    </div>
                </a>
            </div>
            <div class="col">
                <a class="link-menu" href="{{ url('/autores') }}">
                    <div class="campo-menu">
                        <div class="icone-menu"><span class="material-icons size-icone-menu" id="align-icon">cast_for_education</span></div>
                        <div class="titulo-menu">Autores</div>
                    </div>
                </a>
            </div>
            <div class="col">
                <a class="link-menu" href="#">
                    <div class="campo-menu">
                        <div class="icone-menu"><span class="material-icons size-icone-menu" id="align-icon">shopping_cart</span></div>
                        <div class="titulo-menu">Vendas</div>
                    </div>
                </a>
            </div>
        </div>            
    </div>
</div>
@endsection