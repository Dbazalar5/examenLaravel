@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Dashboard - Sistema de Inventario</h1>

    <p>Panel principal del sistema de inventario desarrollado en Laravel.</p>

    <div class="row">
        <div class="col-md-4">
            <div class="card text-center mb-3">
                <div class="card-body">
                    <h5 class="card-title">Categorías</h5>
                    <p class="card-text">Gestión de categorías del inventario.</p>
                    <a href="{{ route('categorias.index') }}" class="btn btn-primary">
                        Ver categorías
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-center mb-3">
                <div class="card-body">
                    <h5 class="card-title">Proveedores</h5>
                    <p class="card-text">Gestión de proveedores registrados.</p>
                    <a href="{{ route('proveedores.index') }}" class="btn btn-primary">
                        Ver proveedores
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-center mb-3">
                <div class="card-body">
                    <h5 class="card-title">Productos</h5>
                    <p class="card-text">Gestión de productos del sistema.</p>
                    <a href="{{ route('productos.index') }}" class="btn btn-primary">
                        Ver productos
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection