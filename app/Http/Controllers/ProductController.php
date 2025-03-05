<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Muestra una lista de todos los productos.
     *
     */
    public function index(Request $request)
    {
        $products = Product::all(); // Trae todos los productos de la base de datos

        if ($request->wantsJson()) {
            return response()->json($products);
        }

        return view('crud.index', compact('products')); // Pasa los productos a la vista
    }

    /**
     * Muestra el formulario para crear un nuevo producto.
     *
     */
    public function create()
    {
        return view('crud.create'); // Muestra la vista para crear un producto
    }

    /**
     * Almacena un nuevo producto en la base de datos.
     *
     */
    public function store(Request $request)
    {
        // Valida los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0'
        ]);

        // Crea un nuevo producto con los datos validados
        $product = Product::create($request->only(['nombre', 'descripcion', 'precio', 'stock']));

        if ($request->wantsJson()) {
            return response()->json(['message' => 'Producto creado exitosamente.', 'product' => $product], 201);
        }

        // Redirige a la lista de productos con un mensaje de éxito
        return redirect()->route('products.index')->with('success', 'Producto creado exitosamente.');
    }

    /**
     * Muestra los detalles de un producto específico.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Product $product)
    {
        if ($request->wantsJson()) {
            return response()->json($product);
        }

        return view('crud.show', ['product' => $product]); // Muestra la vista con los detalles del producto
    }

    /**
     * Muestra el formulario para editar un producto específico.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('crud.edit', ['product' => $product]); // Muestra la vista para editar el producto
    }

    /**
     * Actualiza un producto específico en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        // Valida los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0'
        ]);

        // Actualiza el producto con los datos validados
        $product->update($request->only(['nombre', 'descripcion', 'precio', 'stock']));

        if ($request->wantsJson()) {
            return response()->json(['message' => 'Producto actualizado correctamente.', 'product' => $product]);
        }

        // Redirige a la lista de productos con un mensaje de éxito
        return redirect()->route('products.index')->with('success', 'Producto actualizado correctamente.');
    }

    /**
     * Elimina un producto específico de la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Product $product)
    {
        // Elimina el producto
        $product->delete();

        if ($request->wantsJson()) {
            return response()->json(['message' => 'Producto eliminado correctamente.']);
        }

        // Redirige a la lista de productos con un mensaje de éxito
        return redirect()->route('products.index')->with('success', 'Producto eliminado correctamente.');
    }
}
