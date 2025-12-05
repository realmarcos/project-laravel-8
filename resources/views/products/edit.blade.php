<h1>Editar Produto</h1>

<form action="{{ route('products.update', $product) }}" method="POST">
    @csrf
    @method('PUT')

    Nome: <input type="text" name="name" value="{{ $product->name }}"><br>
    Descrição: <textarea name="description">{{ $product->description }}</textarea><br>
    Preço: <input type="text" name="price" value="{{ $product->price }}"><br>

    <button type="submit">Atualizar</button>
</form>
