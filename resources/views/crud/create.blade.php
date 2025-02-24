<!DOCTYPE html>
<html>
<head>
    <title>Crear Producto</title>
</head>
<body>
    <h1>Crear Producto</h1>

    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <label>Nombre:</label>
        <input type="text" name="nombre" required><br>

        <label>Descripción:</label>
        <textarea name="descripcion" required></textarea><br>

        <label>Precio:</label>
        <input type="number" name="precio" required><br>

        <label>Stock:</label>
        <input type="number" name="stock" required><br>

        <button type="submit">Guardar</button>
    </form>

    <a href="{{ route('products.index') }}">Volver a la lista</a>
</body>
</html>
