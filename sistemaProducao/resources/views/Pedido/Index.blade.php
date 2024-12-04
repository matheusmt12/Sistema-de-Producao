@extends('site.layout.app')

@section('title', 'Pedidos')

@section('nav')
<div class="card ">
    <div class="card-header">
        <div class="row">
            <h3>Pedidos</h3>
        </div>
        <button type="button" class="btn btn-primary"><a href="{{route('Pedido.create')}}" style="text-decoration: none; color: white;">Novo Pedido</a></button>
    </div>
    <div class="card-body ">
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
                    <td>{{date_format(date_create($p->data_pedido),'d-m-Y')}}</td>
                    <td>{{date_format(date_create($p->data_entrega),'d-m-Y')}}</td>
                    @if($p->status == 'ENTREGUE')
                    <td data-bs-toggle="tooltip" title="O pedido já foi entregue" style="padding-left: 30px;"><i class="bi bi-check-circle-fill" style="color: green;"></i></td>
                    @elseif($p->status == 'A CAMINHO')
                    <td data-bs-toggle="tooltip" title="Para entregar" style="padding-left: 30px;"><i class="bi bi-truck" style="color: blue;"></i></td>
                    @elseif($p->status == 'ATRASADO')
                    <td data-bs-toggle="tooltip" title="O Pedido enta atrasado data: {{$p->data_entrega}}" style="padding-left: 30px;"><i class="bi bi-exclamation-triangle-fill" style="color: red;"></i></td>
                    @else
                    <td data-bs-toggle="tooltip" title="O Pedido enta atrasado data: {{$p->data_entrega}}" style="padding-left: 30px;"><i class="bi bi-x-circle-fill" style="color: red;"></i></td>
                    @endif
                    <td><button class="btn btn-info"><a href="pedido/detalhes/{{$p->id}}" style="text-decoration: none; color: white;">Detalhes</a></button></td>
                    <td><button class="btn btn-primary"><a href="pedido/finalizar/{{$p->id}}" style="text-decoration: none; color: white;">Status</a></button></td>
                </tr>
                @endforeach

            </tbody>
        </table>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                @if($pedidos->onFirstPage())
                <li class="page-item disabled"><span class="page-link">Anterior</span></li>
                @else
                <li class="page-item"><a class="page-link" href="{{$pedidos->previousPageUrl()}}">Anterior</a></li>
                @endif
                @for($page = 1; $page <= $pedidos->lastPage(); $page++)
                    @if($pedidos->currentPage() == $page)
                    <li class="page-item disabled"><span class="page-link">{{$page}}</span></li>
                    @else
                    <li class="page-item"><a class="page-link" href="{{$pedidos->url($page)}}">{{$page}}</a></li>
                    @endif
                    @endfor
                    @if($pedidos->onLastPage())
                    <li class="page-item disabled"><span class="page-link">Próximo</span></li>
                    @else
                    <li class="page-item"><a class="page-link" href="{{$pedidos->nextPageUrl()}}">Próximo</a></li>
                    @endif
            </ul>
        </nav>
    </div>
</div>
@endsection