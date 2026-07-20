<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Estado</th>
        </tr>
    </thead>
    <tbody>
        @forelse($categorias as $categoria)
            <tr>
                <td>{{ $categoria->id }}</td>
                <td>{{ $categoria->nombre }}</td>
                <td>{{ $categoria->descripcion }}</td>
                <td>{{ $categoria->estado ? 'Activo' : 'Inactivo' }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center">No hay categorías registradas.</td>
            </tr>
        @endforelse
    </tbody>
</table>