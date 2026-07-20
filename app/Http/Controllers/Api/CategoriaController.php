<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoriaController extends Controller
{
    public function index()
    {
        return response()->json(Categoria::all(), 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|max:100',
            'descripcion' => 'nullable|max:255',
            'estado' => 'required|boolean'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'mensaje' => 'Error de validacion',
                'errores' => $validator->errors()
            ], 422);
        }

        $categoria = Categoria::create($validator->validated());

        return response()->json($categoria, 201);
    }

    public function show($id)
    {
        $categoria = Categoria::find($id);

        if (!$categoria) {
            return response()->json([
                'mensaje' => 'Categoria no encontrada'
            ], 404);
        }

        return response()->json($categoria, 200);
    }

    public function update(Request $request, $id)
    {
        $categoria = Categoria::find($id);

        if (!$categoria) {
            return response()->json([
                'mensaje' => 'Categoria no encontrada'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'nombre' => 'required|max:100',
            'descripcion' => 'nullable|max:255',
            'estado' => 'required|boolean'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'mensaje' => 'Error de validacion',
                'errores' => $validator->errors()
            ], 422);
        }

        $categoria->update($validator->validated());

        return response()->json($categoria, 200);
    }

    public function destroy($id)
    {
        $categoria = Categoria::find($id);

        if (!$categoria) {
            return response()->json([
                'mensaje' => 'Categoria no encontrada'
            ], 404);
        }

        $categoria->delete();

        return response()->json([
            'mensaje' => 'Categoria eliminada correctamente'
        ], 200);
    }
}