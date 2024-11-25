@extends('site.layout.app')

@section('title', 'Novo Pedido')

@section('nav')
<div class="card">
    <h5 class="card-header">Novo Pedido</h5>
    <div class="card-body">
        <form action="{{route ('Pedido.save')}}" method="post">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="form-group">

                        <label for="" class="form-label">Cliente</label>
                        <select name="id_cliente" id="" class="form-control">
                            @foreach($dados->clientes as $c)
                            <option value="{{$c->id}}">{{$c->nome}}</option>
                            @endforeach
                        </select>
                        <small class="form-text text-muted">Selecione o Cliente</small>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="" class="form-label">Tipo de pagamento</label>
                        <select name="tipo_pagamento" id="" class="form-control">
                            @foreach($dados->tipos as $t)
                            <option value="{{$t}}">{{$t}}</option>
                            @endforeach
                        </select>
                        <small class="form-text text-muted">Selecione o tipo de pagamento</small>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="" class="form-label">Data do pedido</label>
                        <input type="datetime-local" name="data_pedido" class="form-control">
                        <small class="form-text text-muted">Informe a data do pedido</small>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">

                        <label for="" class="form-label">Data de entrega</label>
                        <input type="datetime-local" class="form-control" name="data_entrega">
                        <small class="form-text text-muted">Informe a data de entrega</small>
                    </div>
                </div>
            </div>
            <button class="btn btn-secondary"><a href="{{route ('Pedido.inicio')}}" style="color: white; text-decoration: none;">Voltar</a></button>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
</div>

@endsection