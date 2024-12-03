@extends('site.layout.app')

@section('title', 'Produto')

@section('nav')

<div class="card">
    <div class="card-header">
        <h3>Novo Cliente</h3>
        <div>
            <button type="button" class="btn btn-primary"><a href="{{route('Produto.create')}}" style="text-decoration: none; color: white;">Adicionar Produto</a></button>
        </div>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Estoque</th>
                </tr>
            </thead>
            <tbody>
                @foreach($produtos as $p)

                <tr>
                    <td>{{$p->id}}</td>
                    <td>{{$p->nome}}</td>
                    <td>{{$p->valor}}</td>
                    <td>{{$p->estoque}}</td>
                </tr>
                @endforeach

            </tbody>
        </table>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                @if($produtos->onFirstPage())
                <li class="page-item disabled"><a class="page-link" href="{{$produtos->previousPageUrl()}}">Previous</a></li>
                @else
                <li class="page-item"><a class="page-link" href="{{$produtos->previousPageUrl()}}">Previous</a></li>
                @endif
                @for($page = 1 ; $page <= $produtos->lastPage(); $page++)
                    @if($produtos->currentPage() == $page)
                    <li class="page-item disabled"><a class="page-link" href="{{$produtos->url($page)}}">{{$page}}</a></li>
                    @else
                    <li class="page-item"><a class="page-link" href="{{$produtos->url($page)}}">{{$page}}</a></li>
                    @endif
                    @endfor
                    @if($produtos->onLastPage())
                    <li class="page-item disabled"><a class="page-link" href="{{$produtos->nextPageUrl()}}">Next</a></li>
                    @else
                    <li class="page-item"><a class="page-link" href="{{$produtos->nextPageUrl()}}">Next</a></li>
                    @endif
            </ul>
        </nav>
    </div>
</div>


@endsection