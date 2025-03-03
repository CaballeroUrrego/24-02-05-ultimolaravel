<!-- filepath: /c:/xampp/htdocs/24-02-05-ultimolaravel/resources/views/crud/create.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <!-- Encabezado de la tarjeta con el título "Crear Producto" -->
                    <div class="card-header text-center">{{ __('Crear Producto') }}</div>
                    <div class="card-body">
                        <form action="{{ route('products.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre:</label>
                                <input type="text" id="nombre" name="nombre" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="descripcion" class="form-label">Descripción:</label>
                                <textarea id="descripcion" name="descripcion" class="form-control" required></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="precio" class="form-label">Precio:</label>
                                <input type="number" id="precio" name="precio" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="stock" class="form-label">Stock:</label>
                                <input type="number" id="stock" name="stock" class="form-control" required>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                                <a href="{{ route('products.index') }}" class="btn btn-secondary">Volver a la lista</a>
                            </div>
                        </form>
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
