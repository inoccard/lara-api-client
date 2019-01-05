@extends('testes-api.layouts.template')

@section('content-api')

<h1>Listagem de produtos</h1>

@if( session('success') )
    <div class="alert alert-success">
            {{ session('success') }}
    </div>
@endif

<a href="{{ route('products.create') }}" class="btn btn-success">Cadastrar <span class="glyphicon glyphicon-plus"></span></a>

<table class="table table-striped">
    <tr>
	    <th>Nome</th>
        <th>Descrição</th>
        <th>Ação</th>
    </tr>
    @forelse($products->data as $product)
    	<tr>
            <td>{{ $product->nome }}</td>
            <td>{{ $product->descricao }}</td>
            <td>
                <a href="{{ route('products.edit', $product->id) }}">
                    Editar 
                </a> | 
		        <a href="{{ route('products.show', $product->id) }}">
                        Visualizar 
                    </a>
        	</td>
    	</tr>
    @empty
    <tr>
        <td colspan="20"> Nenhum Produto Encontrado</td>
    </tr>
    @endforelse
</table>
<nav aria-label="Page navigation example">
        <ul class="pagination">
          <li class="page-item">
            @if( $products->prev_page_url != '')
            <a class="page-link" href="{{ route('products.paginate',$products->current_page-1) }}" aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
              <span class="sr-only">Previous</span>
            </a>
            @endif
          </li>
          <li class="page-item"><a class="page-link" href="#">{{ $products->current_page }}</a></li>
         @if( $products->next_page_url != '')
         <li>
            <a class="page-link" href="{{ route('products.paginate',$products->current_page+1) }}" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
        @endif
          </li>
        </ul>
      </nav>
@endsection