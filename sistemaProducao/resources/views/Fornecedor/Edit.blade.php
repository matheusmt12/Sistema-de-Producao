@extends('site.layout.app')

@section('title','Editar Fornecedor')

@section('nav')

<div class="card">
    <div class="card-header">
        <h4>Fornecedor <strong>{{$fornecedor->nome_contato}}</strong></h4>
    </div>
    <div class="card-body">
        <form action="{{route('Fornecedor.editSave')}}" method="post">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="" class="fomr-label">Nome</label>
                        <input type="text" class="form-control" value="{{$fornecedor->nome_contato}}" name="nome_contato">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="" class="fomr-label">CNPJ</label>
                        <input type="text" name="cnpj" class="form-control" value="{{$fornecedor->cnpj}}">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="" class="form-label">Telefone</label>
                        <input type="text" class="form-control" name="telefone" value="{{$fornecedor->telefone}}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="" class="form-label">Rua</label>
                        <input type="text" class="form-control" name="rua" value="{{$fornecedor->rua}}">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="" class="form-label">Cidade</label>
                        <input type="text" class="form-control" name="cidade" value="{{$fornecedor->cidade}}">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="" class="form-label">Estado</label>
                        <input type="text" class="form-control" maxlength="2" name="estado" value="{{$fornecedor->estado}}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="" class="form-label">Razão Social</label>
                        <textarea name="razao_social" class="form-control" id="" >{{$fornecedor->razao_social}}</textarea>
                    </div>
                </div>
            </div>
            <input type="hidden" name="id" value="{{$fornecedor->id}}">
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
</div>


@endsection