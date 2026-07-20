@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Categorías</h1>
    <p>Listado de categorías registradas en el sistema de inventario.</p>

    @include('categorias.tabla')
    @include('categorias.modal')
</div>
@endsection

@include('categorias.scripts')