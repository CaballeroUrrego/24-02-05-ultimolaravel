<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all(); // Trae todos los productos de la base de datos
        return view('crud.index', compact('products')); // Asegúrate de que la vista está bien referenciada
    }


    public function create()
    {
        return view('crud.create'); // Cambio en la vista
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0'
        ]);

        Product::create($request->only(['nombre', 'descripcion', 'precio', 'stock']));

        return redirect()->route('products.index')->with('success', 'Producto creado exitosamente.');
    }

    public function show(Product $product)
    {
        return view('crud.show', ['product' => $product]); // Cambio en la vista
    }

    public function edit(Product $product)
    {
        return view('crud.edit', ['product' => $product]); // Cambio en la vista
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0'
        ]);

        $product->update($request->only(['nombre', 'descripcion', 'precio', 'stock']));

        return redirect()->route('products.index')->with('success', 'Producto actualizado correctamente.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Producto eliminado correctamente.');
    }
}

