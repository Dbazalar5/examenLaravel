<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Categoría</th>
            <th>Proveedor</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Stock</th>
        </tr>
    </thead>
    <tbody>
        @forelse($productos as $producto)
            <tr>
                <td>{{ $producto->id }}</td>
                <td>{{ $producto->categoria->nombre ?? 'Sin categoría' }}</td>
                <td>{{ $producto->proveedor->nombre ?? 'Sin proveedor' }}</td>
                <td>{{ $producto->nombre }}</td>
                <td>{{ $producto->descripcion }}</td>
                <td>S/ {{ $producto->precio }}</td>
                <td>{{ $producto->stock }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="7" class="text-center">No hay productos registrados.</td>
            </tr>
        @endforelse
    </tbody>
</table>