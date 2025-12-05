<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product; // importação da Model Product

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all(); // Recupera todos os produtos do banco de dados
        return view('products.index', ['products' => $products]); // Retorna a view com a lista de produtos
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create'); // Retorna a view para criar um novo produto
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([ // Validação dos dados recebidos
            'name' => 'required',
            'price' => 'required|numeric'
        ]);

        Product::create($request->all()); // Cria um novo produto no banco de dados
        return redirect()->route('products.index')->with('success', 'Produto criado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('products.show', ['product' => Product::find($id)]); // Retorna a view com os detalhes do produto especificado
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('products.edit', ['product' => Product::find($id)]); // Retorna a view para editar o produto especificado
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric'
        ]);

        $product = Product::find($id);
        $product->update($request->all()); // Atualiza o produto no banco de dados
        return redirect()->route('products.index')->with('success', 'Produto atualizado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete(); // Deleta o produto do banco de dados
        return redirect()->route('products.index')->with('success', 'Produto deletado!');
    }
}
