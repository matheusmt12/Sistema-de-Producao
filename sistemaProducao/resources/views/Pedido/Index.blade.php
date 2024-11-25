@extends('site.layout.app')

@section('title', 'Pedidos')

@section('nav')
@foreach($pedidos as $p)
{{$p}}
@endforeach
@endsection