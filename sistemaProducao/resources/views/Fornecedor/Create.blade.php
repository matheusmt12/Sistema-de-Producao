@extends('site.layout.app')


@section('title', 'Novo Fornecedor')

@section('nav')

<div class="card">
    <div class="card-header">
        <h3>Novo Fornecedor</h3>
    </div>
    <div class="card-body">
        <form action="{{route('Fornecedor.save')}}" method="post">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="" class="fomr-label">Nome</label>
                        <input type="text" class="form-control" name="nome_contato">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="" class="fomr-label">CNPJ</label>
                        <input type="text" name="cnpj" class="form-control">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="" class="form-label">Telefone</label>
                        <input type="text" class="form-control" name="telefone">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="" class="form-label">Rua</label>
                        <input type="text" class="form-control" name="rua">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="" class="form-label">Cidade</label>
                        <input type="text" class="form-control" name="cidade">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="" class="form-label">Estado</label>
                        <input type="text" class="form-control" maxlength="2" name="estado">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="" class="form-label">Razão Social</label>
                        <textarea name="razao_social" class="form-control" id=""></textarea>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
</div>
@endsection