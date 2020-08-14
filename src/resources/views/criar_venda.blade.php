@extends('templates/template')
@section('content')
<!-- PARTE 1 ESCOLHER CLIENTE -->
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6">
            <div class="caixa">
                <form action="{{ route('itens.store') }}" method="POST">
                    @csrf
                    <input type="text" name="venda_id" value="{{ $dadosVenda[0]->id }}" hidden>
                    <div class="row">
                        <div class="col-sm-9">
                            <select class="form-control" name="livro_id" id="exampleFormControlSelect2">
                                <option value="">Selecione o Livro</option>
                                @foreach ($livros as $livro)
                                <option value="{{ $livro->id }}">{{ $livro->titulo }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <button type="submit" class="btn btn-primary">Incluir Livro</button>
                        </div>
                    </div>
                </form>
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        <li>{{ $error }}</li>
                    </div>
                @endforeach
                <hr>
                <!-- TABELA DE PRODUTOS -->
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Livro</th>
                        <th scope="col">Editora</th>
                        <th scope="col">Preço</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if(isset($itens))
                      @foreach($itens as $item)
                      <tr>
                        <th scope="row">{{ $item->titulo }}</th>
                        <td>{{ $item->editora }}</td>
                        <td class="valor-calculado">{{ $item->preco }}</td>
                      </tr>
                      @endforeach
                      @endif
                    </tbody>
                  </table>
                  <script>
                        $(function(){

                            var valorCalculado = 0;

                            $( ".valor-calculado" ).each(function() {
                            valorCalculado += parseInt($( this ).text());
                            });
                            $( "#qtdtotal" ).val(valorCalculado);

                        });
                  </script>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="caixa">
                <div class="titulo-pagina">Dados da Venda</div>
                <div class="dados-venda"><strong>Cliente:</strong> {{ $dadosVenda[0]->nomeCliente }}</div>
                <div class="dados-venda"><strong>Data da Compra:</strong> {{ date('d/m/Y', strtotime($dadosVenda[0]->data)) }}</div>
                <div class="dados-venda"><strong>Vendedor:</strong> {{ $dadosVenda[0]->nomeFuncionario }}</div>
                <hr>
                <form action="{{ route('vendas.update', $dadosVenda[0]->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <input type="text" name="id_venda" value="{{ $dadosVenda[0]->id }}" hidden>
                    <div class="form-group">
                        <div class="dados-venda"><strong>Total</strong></div>
                        <input class="form-control total" readonly type="text" name="valor" id="qtdtotal" value="25,00">
                    </div>
                    <div class="btn-form">
                        <button type="submit" class="btn btn-primary btn-salvar">Finalizar Venda</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- ************************ -->
@endsection
