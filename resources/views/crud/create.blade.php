<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

    <h1 class="mb-4">Crear Producto</h1>

    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nombre:</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Descripción:</label>
            <textarea name="descripcion" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Precio:</label>
            <input type="number" name="precio" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Stock:</label>
            <input type="number" name="stock" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>

    <a href="{{ route('products.index') }}" class="btn btn-secondary mt-3">Volver a la lista</a>

</body>
</html>
