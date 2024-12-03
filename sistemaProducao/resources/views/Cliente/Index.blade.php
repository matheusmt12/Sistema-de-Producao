@extends('site.layout.app')

@section('nav')

<div class="card">
    <div class="card-header">
        <div class="row">
            <div>
                <h3>Clientes</h3>
            </div>
            <div>
                <button type="button" class="btn btn-primary"><a href="{{route('Cliente.create')}}" style="text-decoration: none; color: white;">Novo cliente</a></button>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Responsavel</th>
                    <th scope="col">Telefone</th>
                    <th>Açoes</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clientes as $c)
                <tr>

                    <th scope="row">{{$c->id}}</th>
                    <th scope="row">{{$c->nome}}</th>
                    <th scope="row">{{$c->nome_responsavel}}</th>
                    <th scope="row">{{$c->telefone}}</th>
                    <th>
                        <button type="button" class="btn btn-info"><a href="cliente/detalhes/{{$c->id}}" style="text-decoration: none; color: white;">Detalhes</a></button>
                    </th>
                    <th>
                        <button type="button" class="btn btn-secondary"><a href="cliente/edit/{{$c->id}}" style="text-decoration: none; color: white;">Editar</a></button>
                    </th>
                    <th>
                        <button type="button" class="btn btn-danger"><a href="cliente/delete/{{$c->id}}" style="text-decoration: none; color: white;">Excluir</a></button>
                    </th>
                </tr>
                @endforeach
            </tbody>
        </table>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                @if($clientes->onFirstPage())
                <li class="page-item disabled"><a class="page-link" href="{{$clientes->previousPageUrl()}}">Previous</a></li>
                @else
                <li class="page-item"><a class="page-link" href="{{$clientes->previousPageUrl()}}">Previous</a></li>
                @endif
                @for($page = 1; $page <= $clientes->lastPage(); $page++)
                @if($clientes->currentPage() == $page)
                <li class="page-item disabled"><a class="page-link" href="{{$clientes->url($page)}}">{{$page}}</a></li>
                @else
                <li class="page-item "><a class="page-link" href="{{$clientes->url($page)}}">{{$page}}</a></li>
                @endif
                @endfor
                @if($clientes->onLastPage())
                <li class="page-item disabled"><a class="page-link" href="{{$clientes->nextPageUrl()}}">Next</a></li>
                @else
                <li class="page-item"><a class="page-link" href="{{$clientes->nextPageUrl()}}">Next</a></li>
                @endif
            </ul>
        </nav>
    </div>
</div>
@endsection