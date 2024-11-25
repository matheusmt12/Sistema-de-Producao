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
                    <th scope="col"></th>
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
                    <td></td>
                    <td><button class="btn btn-info"><a href="pedido/detalhes/{{$p->id}}" style="text-decoration: none; color: white;">Detalhes</a></button></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection