@extends('testes-api.layouts.template'
)
@section('content-api')

    <h1>Editar Produto: {{ $product->nome }}</h1>

    <a href="{{ route('products.index') }}" class="btn btn-success">Voltar</a>

    {!! Form::model($product, ['route' => ['products.update', $product->id], 'class' => 'form', 'method' => 'PUT']) !!}
    
        @include('testes-api.produtos.form-part')    

    {!! Form::close() !!}
 
@endsection