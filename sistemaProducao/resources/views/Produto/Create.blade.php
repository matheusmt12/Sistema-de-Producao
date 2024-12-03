@extends('site.layout.app')

@section('title','Novo Produto')

@section('nav')

<div class="card">
    <div class="card-header">
        Novo Produto
    </div>
    <div class="card-body">
        <form action="{{route('Produto.save')}}" method="post">
            @csrf
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <label class="form-label">Nome</label>
                        <input type="text" name="nome" class="form-control">
                    </div>
                    <div class="col">
                        <label class="form-label">Valor</label>
                        <input type="number" step="0.01" name="valor" class="form-control">
                    </div>
                    <div class="col">
                        <label class="form-label">Estoque</label>
                        <input type="number" name="estoque" class="form-control">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
</div>


@endsection