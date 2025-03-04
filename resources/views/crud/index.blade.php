<!-- filepath: /c:/xampp/htdocs/24-02-05-ultimolaravel/resources/views/crud/index.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
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
                                @foreach ($products as $product) <!-- Error corregido🤦‍♂️ -->
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

    <!-- Incluir JS de Bootstrap y dependencias -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
