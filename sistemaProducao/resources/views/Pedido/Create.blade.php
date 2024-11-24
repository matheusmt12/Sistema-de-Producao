@extends('site.layout.app')

@section('title', 'Novo Pedido')

@section('nav')
<div class="card">
    <h5 class="card-header">Novo Pedido</h5>
    <div class="card-body">
        <form action="{{route ('Pedido.save')}}" method="post">
            @csrf

            {{$clientes}}
                <!--  -->

                <!--  -->
                <button class="btn btn-secondary"><a href="{{route ('Pedido.inicio')}}" style="color: white; text-decoration: none;">Voltar</a></button>
                <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
</div>

@endsection