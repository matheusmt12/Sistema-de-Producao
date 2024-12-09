@extends('site.layout.app')

@section('title', 'Fornecedor')

@section('nav')

<div class="card">
    <div class="card-header">
        <div>
            <h3>Fornecedores</h3>

        </div>
        <div>
            <button type="button" class="btn btn-primary"><a href="{{route('Fornecedor.create')}}" style="text-decoration: none; color: white;">Novo Fornecedor</a></button>
        </div>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Cnpj</th>
                    <th scope="col">Telefone</th>
                </tr>
            </thead>
            <tbody>
                @foreach($fornecedores as $f)
                <tr>
                    <td>{{$f->id}}</td>
                    <td>{{$f->nome_contato}}</td>
                    <td>{{$f->cnpj}}</td>
                    <td>{{$f->telefone}}</td>
                </tr>

                @endforeach
            </tbody>
        </table>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                @if($fornecedores->onFirstPage())
                <li class="page-item disabled"><a class="page-link" href="{{$fornecedores->previousPageUrl()}}">Previous</a></li>
                @else
                <li class="page-item"><a class="page-link" href="{{$fornecedores->previousPageUrl()}}">Previous</a></li>
                @endif
                @for($page = 1; $page <= $fornecedores->lastPage(); $page++)
                    @if($page == $fornecedores->currentPage())
                    <li class="page-item disabled"><a class="page-link" href="{{$fornecedores->url($page)}}">{{$page}}</a></li>
                    @else
                    <li class="page-item"><a class="page-link" href="{{$fornecedores->url($page)}}">{{$page}}</a></li>
                    @endif
                @endfor
                @if($fornecedores->onLastPage())
                <li class="page-item disabled"><a class="page-link" href="{{$fornecedores->nextPageUrl()}}">Next</a></li>
                @else
                <li class="page-item"><a class="page-link" href="{{$fornecedores->nextPageUrl()}}">Next</a></li>
                @endif
            </ul>
        </nav>
    </div>
</div>
@endsection
