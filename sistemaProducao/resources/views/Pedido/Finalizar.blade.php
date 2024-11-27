@extends('site.layout.app')

@section('title', 'Finalizar Pedido')


@section('nav')
<div class="card">
    <div class="card-heard">
        <h3>Status do Pedido</h3>
    </div>
    <form action="{{route ('Pedido.concluir')}}" method="post">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="form-group col">
                    <label for="" class="form-label">Nome do Cliente</label>
                    <label for="" class="form-control">{{$objPedido->pedido->cliente->nome}}</label>
                </div>
                <div class="form-group col">
                    <label for="" class="form-label">Data do pedido</label>
                    <label for="" class="form-control">{{date_format(date_create($objPedido->pedido->data_pedido),'d-m-Y')}}</label>
                </div>
            </div>
            <div class="row">
                <div class="form-group col">
                    <label for="" class="form-label">Cidade</label>
                    <label for="" class="form-control">{{$objPedido->pedido->cliente->cidade}}</label>
                </div>
                <div class="form-group col">
                    <label for="" class="form-label">Rua</label>
                    <label for="" class="form-control">{{$objPedido->pedido->cliente->rua}}</label>
                </div>
                <div class="form-group col">
                    <label for="" class="form-label">Estado</label>
                    <label for="" class="form-control">{{$objPedido->pedido->cliente->estado}}</label>
                </div>
                <div class="form-group col">
                    <label for="" class="form-label">Estado</label>
                    <label for="" class="form-control">{{$objPedido->pedido->cliente->num_casa}}</label>
                </div>
            </div>
            <div class="row">
                <div class="form-group col">
                    <label for="" class="form-label">Data previst de Entrega</label>
                    <label for="" class="form-control">{{date_format(date_create($objPedido->pedido->data_entrega), 'd-m-Y')}}</label>
                </div>
                <div class="form-group col">
                    <label for="" class="form-label">Status Atual </label>
                    <label class="form-control">{{$objPedido->pedido->status}}</label>
                </div>
            </div>
            <div class="row">
                <div class="form-group col">
                    <label for="" class="form-label">Altrar Status do Pedido </label>
                    <select name="status" id="" class="form-control">
                        @foreach($objPedido->status as $s)
                        <option value="{{$s}}">{{$s}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col"></div>
            </div>
            <input type="hidden" name="id" value="{{$objPedido->pedido->id}}">
            <button class="btn btn-secondary"><a href="{{route ('Pedido.inicio')}}" style="text-decoration: none; color: white;">Voltar</a></button>
            <button type="submit" class="btn btn-success">Finalizar</button>
        </div>
    </form>

</div>
@endsection