@extends('site.layout.app')

@section('title', 'Finalizar Pedido')


@section('nav')
<div class="card">
    <div class="card-heard">
        <h3>Finalizar Pedido</h3>
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
                @if(isset($pedido->data_entrega_efetuada))
                <label for="" class="form-control">Entregue <i class="bi bi-check-circle-fill" style="color: green;"></i></label>
                @elseif($pedido->data_entrega > date_format(date_create(),'Y-m-d H:i'))
                <label for="" class="form-control">O pedido ainda não foi entregue <i class="bi bi-truck" style="color: blue;"></i></label>
                @else
                <label for="" class="form-control">A entrega do pedido está atrasada <i class="bi bi-exclamation-triangle-fill" style="color: red;"></i></label>
                @endif
            </div>
        </div>
        <form action="{{route ('Pedido.concluir')}}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{$pedido->id}}">
            <button class="btn btn-secondary"><a href="{{route ('Pedido.inicio')}}" style="text-decoration: none; color: white;">Voltar</a></button>
            @if(isset($pedido->data_entrega_efetuada))
            <button type="button" class="btn btn-success"   disabled>Finalizar</button>
            @else
            <button type="submit" class="btn btn-success">Finalizar</button>
            @endif
        </form>
    </div>
</div>
@endsection