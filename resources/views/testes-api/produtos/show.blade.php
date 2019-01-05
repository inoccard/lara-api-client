@extends('testes-api.layouts.template'
)
@section('content-api')

    <a href="{{ route('products.index') }}" class="btn btn-success">Voltar</a>

    <h1>Nome: {{ $product->nome }}</h1>
    <h1>Descrição: {{ $product->descricao }}</h1>

    {!! Form::open(['route' => ['products.destroy',$product->id], 'class' => 'form', 'method' => 'DELETE']) !!}
    
        <input type="submit" value="Deletar" class="btn btn-danger">  

    {!! Form::close() !!}

@endsection