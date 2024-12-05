@extends('site.layout.app')

@section('title', 'Estoque Produto')

@section('nav')

<div class="card">
    <div class="card-header">
        <h3>Estoque de Produto</h3>
    </div>
    <div class="card-body">
        <form action="{{route('Produto.salvarEstoque')}}" method="post">
            @csrf
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <label for="" class="form-label">Quantidade Atual</label>
                        <label for="" class="form-control">{{$produto->estoque}}</label>
                    </div>
                    <div class="col">
                        <label for="" class="form-label">Quantidade a ser Adicionada</label>
                        <input type="number" name="quantidade" class="form-control">
                        <input type="hidden" value="{{$produto->id}}" name="id">
                        @error('quantidade')
                            <div style="color: red;">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" type="submit">Salvar</button>
        </form>
    </div>
</div>

@endsection