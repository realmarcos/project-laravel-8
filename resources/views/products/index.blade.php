<h1>Lista de Produtos</h1>

<a href="{{ route('products.create') }}">Novo Produto</a>

<ul>
    @foreach ($products as $product)
    <li>
        {{ $product->name }} - R$ {{ $product->price }}
        <a href="{{ route('products.edit', $product) }}">Editar</a>

        <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline">
            @csrf
            @method('DELETE')
            <button type="submit">Excluir</button>
        </form>
    </li>
    @endforeach
</ul>