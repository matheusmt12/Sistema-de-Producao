@extends('site.layout.app')

@section('title', 'Detalhe Pedido')

@section('nav')

<div class="card">
    <div class="card-heard">
        <h3>Pedido</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="form-group col">
                <label for="" class="form-label">Nome do Cliente</label>
                <label for="" class="form-control">{{$pedido->cliente->nome}}</label>
            </div>
            <div class="form-group col">
                <label for="" class="form-label">Data do pedido</label>
                <label for="" class="form-control">{{date_format(date_create($pedido->data_pedido),'d-m-Y')}}</label>
            </div>
        </div>
        <div class="row">
            <div class="form-group col">
                <label for="" class="form-label">Cidade</label>
                <label for="" class="form-control">{{$pedido->cliente->cidade}}</label>
            </div>
            <div class="form-group col">
                <label for="" class="form-label">Rua</label>
                <label for="" class="form-control">{{$pedido->cliente->rua}}</label>
            </div>
            <div class="form-group col">
                <label for="" class="form-label">Estado</label>
                <label for="" class="form-control">{{$pedido->cliente->estado}}</label>
            </div>
            <div class="form-group col">
                <label for="" class="form-label">Estado</label>
                <label for="" class="form-control">{{$pedido->cliente->num_casa}}</label>
            </div>
        </div>
        <div class="row">
            <div class="form-group col">
                <label for="" class="form-label">Data previst de Entrega</label>
                <label for="" class="form-control">{{date_format(date_create($pedido->data_entrega), 'd-m-Y')}}</label>
            </div>
            <div class="form-group col">
                <label for="" class="form-label">Status do Pedido </label>
                <label for="" class="form-control">O pedido foi entregue na data "{{date_format(date_create($pedido->data_entrega),'d-m-Y')}}"
                    @if($pedido->status == 'ENTREGUE')
                    <i class="bi bi-check-circle-fill" style="color: green;"></i>
                    @elseif($pedido->status == 'A CAMINHO')
                    <i class="bi bi-truck" style="color: blue;"></i>
                    @elseif($pedido->status == 'ATRASADO')
                    <i class="bi bi-exclamation-triangle-fill" style="color: red;"></i>
                    @else
                    <i class="bi bi-x-circle-fill" style="color: red;"></i>
                    @endif
                </label>
            </div>
        </div>
        <button class="btn btn-secondary"><a href="{{route ('Pedido.inicio')}}" style="text-decoration: none; color: white;">Voltar</a></button>
    </div>
</div>

@endsection