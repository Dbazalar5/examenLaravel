@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Proveedores</h1>
    <p>Listado de proveedores registrados en el sistema.</p>

    @include('proveedores.tabla')
    @include('proveedores.modal')
</div>
@endsection

@include('proveedores.scripts')