<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>RUC</th>
            <th>Teléfono</th>
            <th>Correo</th>
            <th>Dirección</th>
        </tr>
    </thead>
    <tbody>
        @forelse($proveedores as $proveedor)
            <tr>
                <td>{{ $proveedor->id }}</td>
                <td>{{ $proveedor->nombre }}</td>
                <td>{{ $proveedor->ruc }}</td>
                <td>{{ $proveedor->telefono }}</td>
                <td>{{ $proveedor->correo }}</td>
                <td>{{ $proveedor->direccion }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center">No hay proveedores registrados.</td>
            </tr>
        @endforelse
    </tbody>
</table>