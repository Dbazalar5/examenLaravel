<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DetalleVenta;
use Illuminate\Http\Request;

class DetalleVentaController extends Controller
{
    public function index()
    {
        return DetalleVenta::with(['venta', 'producto'])->get();
    }

    public function store(Request $request)
    {
        $detalle = DetalleVenta::create($request->all());
        return response()->json($detalle, 201);
    }

    public function show($id)
    {
        $detalle = DetalleVenta::with(['venta', 'producto'])->findOrFail($id);
        return response()->json($detalle);
    }

    public function update(Request $request, $id)
    {
        $detalle = DetalleVenta::findOrFail($id);
        $detalle->update($request->all());

        return response()->json($detalle);
    }

    public function destroy($id)
    {
        $detalle = DetalleVenta::findOrFail($id);
        $detalle->delete();

        return response()->json([
            'mensaje' => 'Detalle de venta eliminado correctamente'
        ]);
    }
}