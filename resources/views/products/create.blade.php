<h1>Novo Produto</h1>

<form action="{{ route('products.store') }}" method="POST">
    @csrf

    Nome: <input type="text" name="name"><br>
    Descrição: <textarea name="description"></textarea><br>
    Preço: <input type="text" name="price"><br>

    <button type="submit">Salvar</button>
</form>
