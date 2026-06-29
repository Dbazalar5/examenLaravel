<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Venta;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    public function index()
    {
        return Venta::with(['cliente', 'detalles'])->get();
    }

    public function store(Request $request)
    {
        $venta = Venta::create($request->all());
        return response()->json($venta, 201);
    }

    public function show($id)
    {
        $venta = Venta::with(['cliente', 'detalles'])->findOrFail($id);
        return response()->json($venta);
    }

    public function update(Request $request, $id)
    {
        $venta = Venta::findOrFail($id);
        $venta->update($request->all());

        return response()->json($venta);
    }

    public function destroy($id)
    {
        $venta = Venta::findOrFail($id);
        $venta->delete();

        return response()->json([
            'mensaje' => 'Venta eliminada correctamente'
        ]);
    }
}