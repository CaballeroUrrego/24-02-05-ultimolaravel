@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <!-- Encabezado de la tarjeta con el título "Dashboard-Productos" -->
                <div class="card-header text-center">{{ __('Dashboard-Productos') }}</div>
                <div class="card-body">
                    <h2 class="mb-4">Lista de Productos</h2>

                    @if(session('success'))
                        <!-- Mensaje de éxito si la sesión contiene el mensaje "success" -->
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Tabla para mostrar la lista de productos -->
                    <table class="table table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->nombre }}</td>
                                    <td>${{ number_format($product->precio, 2) }}</td>
                                    <td>
                                        <!-- Enlace para editar el producto -->
                                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                        <!-- Formulario para eliminar el producto -->
                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que quieres eliminar este producto?')">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Enlace para agregar un nuevo producto -->
                    <a href="{{ route('products.create') }}" class="btn btn-primary mt-3">Agregar Producto</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
