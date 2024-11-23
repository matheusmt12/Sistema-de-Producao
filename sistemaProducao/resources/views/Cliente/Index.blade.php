@extends('site.layout.app')

@section('nav')


<div class="card card-header">
    <div class="row">
        <div class="col">
            <h3>Clientes</h3>
        </div>
        <div class="col">
            <div style="padding-bottom: 10px; padding-left: 10px;">
                <button type="button" class="btn btn-primary"><a href="{{route('Cliente.create')}}" style="text-decoration: none; color: white;">Novo cliente</a></button>
            </div>
        </div>
    </div>


    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">nome</th>
                <th>Açoes</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clientes as $c)
            <tr>

                <th scope="row">{{$c->id}}</th>
                <th scope="row">{{$c->nome_responsavel}}</th>
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
</div>

@endsection