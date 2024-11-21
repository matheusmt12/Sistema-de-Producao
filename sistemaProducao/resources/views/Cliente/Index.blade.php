@extends('site.layout.app')

@section('nav')

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">nome</th>
        </tr>
    </thead>
    <tbody>
        @foreach($clientes as $c)
        <tr>

            <th scope="row">{{$c->id}}</th>
            <th scope="row">{{$c->nome_responsavel}}</th>

        </tr>
        @endforeach
    </tbody>
</table>

@endsection