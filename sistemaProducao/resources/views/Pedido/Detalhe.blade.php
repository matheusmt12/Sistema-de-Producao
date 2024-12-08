@extends('site.layout.app')

@section('title', 'Detalhe Pedido')

@section('nav')

<div class="card">
    <div class="card-header">
        <h3>Cliente</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="form-group col">
                <label for="" class="form-label">Nome do Cliente</label>
                <label for="" class="form-control">{{$obj->cliente->cliente->nome}}</label>
            </div>
            <div class="form-group col">
                <label for="" class="form-label">CNPJ</label>
                <label for="" class="form-control">{{$obj->cliente->cliente->cnpj}}</label>
            </div>
            <div class="form-group col">
                <label for="" class="form-label">Telefone</label>
                <label for="" class="form-control">{{$obj->cliente->cliente->telefone}}</label>
            </div>
        </div>
        <div class="row">
            <div class="form-group col">
                <label for="" class="form-label">Cidade</label>
                <label for="" class="form-control">{{$obj->cliente->cliente->cidade}}</label>
            </div>
            <div class="form-group col">
                <label for="" class="form-label">Rua</label>
                <label for="" class="form-control">{{$obj->cliente->cliente->rua}}</label>
            </div>
            <div class="form-group col">
                <label for="" class="form-label">Estado</label>
                <label for="" class="form-control">{{$obj->cliente->cliente->estado}}</label>
            </div>
            <div class="form-group col">
                <label for="" class="form-label">Estado</label>
                <label for="" class="form-control">{{$obj->cliente->cliente->num_casa}}</label>
            </div>
        </div>

        <div class="card-header">
            <h4>Pedido</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label for="" class="form-label">Tipo Pagamento</label>
                            <label for="" class="form-control">{{$obj->cliente->tipo_pagamento}}</label>
                        </div>
                        <div class="col">
                            <label for="" class="form-label">Data do Pedido</label>
                            <label for="" class="form-control">{{date_format(date_create($obj->cliente->data_pedido),'d-m-Y')}}</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col">
                    <label for="" class="form-label">Status do Pedido </label>
                    @if($obj->cliente->status == 'ENTREGUE')
                    <label for="" class="form-control">O pedido foi entregue na data "{{date_format(date_create($obj->cliente->data_entrega),'d-m-Y')}}" <i class="bi bi-check-circle-fill" style="color: green;"></i>
                    </label>
                    @elseif($obj->cliente->status == 'A CAMINHO')
                    <label for="" class="form-control">O pedido esta a caminho <i class="bi bi-truck" style="color: blue;"></i>
                    </label>
                    @elseif($obj->cliente->status == 'ATRASADO')
                    <label for="" class="form-control">O pedido esta atrasado <i class="bi bi-exclamation-triangle-fill" style="color: red;"></i>
                    </label>
                    @else
                    <i class="bi bi-x-circle-fill" style="color: red;"></i>
                    @endif
                    </label>
                </div>

                <div class="form-group col">
                    <label for="" class="form-label">Data previst de Entrega</label>
                    <label for="" class="form-control">{{date_format(date_create($obj->cliente->data_entrega), 'd-m-Y')}}</label>
                </div>
                <div class="form-group col">
                    <label class="form-label">Data de Entrega</label>
                    @if(!isset($p->pedido->data_entrega_efetuada))
                    <label for="" class="form-control">Ainda não foi entregue</label>
                    @else
                    <label for="" class="form-control">{{date_format(date_create($obj->cliente->data_entrega), 'd-m-Y')}}</label>
                    @endif
                </div>
            </div>
        </div>

        <div class="card-header">
            <h4>Produto(s)</h4>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>quantidade</th>
                        <th>valor</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($obj->pedidoP as $p)
                    <tr>
                        <td>{{$p->produto->nome}}</td>
                        <td>{{$p->quantidade}}</td>
                        <td>{{$p->quantidade * $p->produto->valor}}</td>
                    </tr>
                    @endforeach

                </tbody>
            </table>

        </div>
        <button class="btn btn-secondary"><a href="{{route ('Pedido.inicio')}}" style="text-decoration: none; color: white;">Voltar</a></button>
    </div>
</div>

@endsection