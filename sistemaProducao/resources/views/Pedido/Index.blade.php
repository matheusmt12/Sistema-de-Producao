@extends('site.layout.app')

@section('title', 'Pedidos')

@section('nav')
<div class="card">
    <div class="card-header">
        <h3>Pedidos</h3>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome Cliente</th>
                    <th scope="col">Data do Pedido</th>
                    <th scope="col">Data prevista da Entrega</th>
                    <th scope="col">Entrega</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pedidos as $p)
                <tr>
                    <td>{{$p->id}}</td>
                    <td>{{$p->cliente->nome}}</td>
                    <td>{{$p->data_pedido}}</td>
                    <td>{{$p->data_entrega}}</td>

                    @if(isset($p->data_entrega_efetuada))
                    <th data-bs-toggle="tooltip" title="O pedido já foi entregue" style="padding-left: 30px;"><i class="bi bi-check-circle-fill" style="color: green;"></i></th>
                    @elseif($p->data_entrega > date_format(date_create(),'Y-m-d H:i'))
                    <th data-bs-toggle="tooltip" title="Para entregar" style="padding-left: 30px;"><i class="bi bi-truck" style="color: blue;"></i></th>
                    @else
                    <th data-bs-toggle="tooltip" title="O Pedido enta atrasado data: {{$p->data_entrega}}" style="padding-left: 30px;"><i class="bi bi-exclamation-triangle-fill" style="color: red;"></i></th>
                    @endif
                    <td><button class="btn btn-info"><a href="pedido/detalhes/{{$p->id}}" style="text-decoration: none; color: white;">Detalhes</a></button></td>
                    <td><button class="btn btn-success"><a href="pedido/finalizar/{{$p->id}}" style="text-decoration: none; color: white;">Finalizar</a></button></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection