<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Categoria;
use App\Models\Proveedor;
use App\Models\Producto;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/dashboard/categorias', function () {
    $categorias = Categoria::all();
    return view('categorias.index', compact('categorias'));
})->name('categorias.index');

Route::get('/dashboard/proveedores', function () {
    $proveedores = Proveedor::all();
    return view('proveedores.index', compact('proveedores'));
})->name('proveedores.index');

Route::get('/dashboard/productos', function () {
    $productos = Producto::with(['categoria', 'proveedor'])->get();
    return view('productos.index', compact('productos'));
})->name('productos.index');