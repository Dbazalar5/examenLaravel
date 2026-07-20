<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProveedorController extends Controller
{
    public function index()
    {
        return response()->json(Proveedor::all(), 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|max:100',
            'ruc' => 'nullable|max:20|unique:proveedores,ruc',
            'telefono' => 'nullable|max:20',
            'correo' => 'nullable|email|max:100',
            'direccion' => 'nullable|max:255'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'mensaje' => 'Error de validacion',
                'errores' => $validator->errors()
            ], 422);
        }

        $proveedor = Proveedor::create($validator->validated());

        return response()->json($proveedor, 201);
    }

    public function show($id)
    {
        $proveedor = Proveedor::find($id);

        if (!$proveedor) {
            return response()->json([
                'mensaje' => 'Proveedor no encontrado'
            ], 404);
        }

        return response()->json($proveedor, 200);
    }

    public function update(Request $request, $id)
    {
        $proveedor = Proveedor::find($id);

        if (!$proveedor) {
            return response()->json([
                'mensaje' => 'Proveedor no encontrado'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'nombre' => 'required|max:100',
            'ruc' => 'nullable|max:20|unique:proveedores,ruc,' . $id,
            'telefono' => 'nullable|max:20',
            'correo' => 'nullable|email|max:100',
            'direccion' => 'nullable|max:255'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'mensaje' => 'Error de validacion',
                'errores' => $validator->errors()
            ], 422);
        }

        $proveedor->update($validator->validated());

        return response()->json($proveedor, 200);
    }

    public function destroy($id)
    {
        $proveedor = Proveedor::find($id);

        if (!$proveedor) {
            return response()->json([
                'mensaje' => 'Proveedor no encontrado'
            ], 404);
        }

        $proveedor->delete();

        return response()->json([
            'mensaje' => 'Proveedor eliminado correctamente'
        ], 200);
    }
}