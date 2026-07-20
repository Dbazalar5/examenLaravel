<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductoController extends Controller
{
    public function index()
    {
        return response()->json(
            Producto::with(['categoria', 'proveedor'])->get(),
            200
        );
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'categoria_id' => 'required|exists:categorias,id',
            'proveedor_id' => 'required|exists:proveedores,id',
            'nombre' => 'required|max:100',
            'descripcion' => 'nullable|max:255',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'mensaje' => 'Error de validacion',
                'errores' => $validator->errors()
            ], 422);
        }

        $producto = Producto::create($validator->validated());

        return response()->json($producto, 201);
    }

    public function show($id)
    {
        $producto = Producto::with(['categoria', 'proveedor'])->find($id);

        if (!$producto) {
            return response()->json([
                'mensaje' => 'Producto no encontrado'
            ], 404);
        }

        return response()->json($producto, 200);
    }

    public function update(Request $request, $id)
    {
        $producto = Producto::find($id);

        if (!$producto) {
            return response()->json([
                'mensaje' => 'Producto no encontrado'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'categoria_id' => 'required|exists:categorias,id',
            'proveedor_id' => 'required|exists:proveedores,id',
            'nombre' => 'required|max:100',
            'descripcion' => 'nullable|max:255',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'mensaje' => 'Error de validacion',
                'errores' => $validator->errors()
            ], 422);
        }

        $producto->update($validator->validated());

        return response()->json($producto, 200);
    }

    public function destroy($id)
    {
        $producto = Producto::find($id);

        if (!$producto) {
            return response()->json([
                'mensaje' => 'Producto no encontrado'
            ], 404);
        }

        $producto->delete();

        return response()->json([
            'mensaje' => 'Producto eliminado correctamente'
        ], 200);
    }
}