<?php

namespace App\Http\Controllers;

use App\Models\auto;
use App\Models\detalle;
use App\Models\venta;
use Illuminate\Http\Request;

class detalleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $autos = auto::all();
        $ventas = venta::all();

        return view('registroventas.addventa', compact('autos', 'ventas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $detalle = detalle::create([
            'auto_id' => $request->auto_id,
            'cantidad' => $request->cantidad,
            'precio_total' => $request->precio_total,
        ]);

        return back()->with('message', 'ok');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
