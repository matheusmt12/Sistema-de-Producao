@extends('site.layout.app')
@section('title', 'Detalhes cliente')

@section('nav')
<div class="card">
    <div class="card-header">
        Cliente
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
                <label for="" class="form-label">Telefone</label>
                <label for="" class="form-control">{{$cliente->telefone}}</label>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="" class="form-label">Razão Social</label>
                <label for="" class="form-control">{{$cliente->razao_social}}</label>
            </div>
            <div class="col">
                <label for="" class="form-label">Ramo Ativo</label>
                <label for="" class="form-control">{{$cliente->ramo_ativo}}</label>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="" class="form-label">Cidade</label>
                <label for="" class="form-control">{{$cliente->cidade}}</label>
            </div>
            <div class="col">
                <label for="" class="form-label">Estado</label>
                <label for="" class="form-control">{{$cliente->estado}}</label>
            </div>
            <div class="col">
                <label for="" class="form-label">Rau</label>
                <label for="" class="form-control">{{$cliente->rua}}</label>
            </div>
            <div class="col">
                <label for="" class="form-label">N°</label>
                <label for="" class="form-control">{{$cliente->num_casa}}</label>
            </div>
        </div>
        <button class="btn btn-primary"><a href="{{route ('Cliente.inicio')}}" style="color: white; text-decoration: none;">Voltar</a></button>
    </div>
</div>

@endsection