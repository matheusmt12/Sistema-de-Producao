@extends('site.layout.app')

@section('title', 'Deletar Cliente')
@section('nav')
<div class="card">
    <div class="card-header">
        Deletar Cliente
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col">
                <label for="" class="form-label">Nome</label>
                <label for="" class="form-control">{{$cliente->nome}}</label>
            </div>
            <div class="col">
                <label for="" class="form-label">Reponsavel</label>
                <label for="" class="form-control">{{$cliente->nome_responsavel}}</label>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="" class="form-label">Cnpj</label>
                <label for="" class="form-control">{{$cliente->cnpj}}</label>
            </div>
            <div class="col">
            </div>
        </div>
        <form action="{{route ('Cliente.destroy')}}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{$cliente->id}}">
            <button type="submit" class="btn btn-danger">Deletar</button>
        </form>
    </div>
</div>
@endsection