@extends('crud.layout')

@section('title', 'Detalles del Producto')

@section('content')
<div class="container">
    <h2 class="my-4">Detalles del Producto</h2>
    <a href="{{ route('products.index') }}" class="btn btn-secondary mb-3">Regresar</a>

    <div class="card">
        <div class="card-body">
            <h3>{{ $product->nombre }}</h3>
            <p><strong>Descripción:</strong> {{ $product->descripcion }}</p>
            <p><strong>Precio:</strong> ${{ number_format($product->precio, 2) }}</p>
            <p><strong>Stock:</strong> {{ $product->stock }}</p>
        </div>
    </div>
</div>
@endsection
