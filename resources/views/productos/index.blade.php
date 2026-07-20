@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Productos</h1>
    <p>Listado de productos registrados en el inventario.</p>

    @include('productos.tabla')
    @include('productos.modal')
</div>
@endsection

@include('productos.scripts')