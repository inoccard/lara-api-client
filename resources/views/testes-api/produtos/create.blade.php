@extends('testes-api.layouts.template')

@section('content-api')

<h1>Cadastrar Novo Produto</h1>
<a href="{{route('products.index')}}">Voltar</a>

{!! Form::open(['route' => 'products.store', 'class' => 'form']) !!}
    
@include('testes-api.produtos.form-part')    

{!! Form::close() !!}
@endsection