<?php

namespace App\Http\Controllers;

use App\Models\auto;
use App\Models\despacho;
use App\Models\unidad;
use Illuminate\Http\Request;

class despachoController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function index()
    {
        $autos = auto::whereDoesntHave('despacho')
            ->where('disponible', false)
            ->get();
        return view('registroventas.despacho', compact('autos'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // Validaciones
        $request->validate([
            'auto_id' => 'required|exists:autos,id',
            'fecha_entrega' => 'required|date',
            // Agrega otras validaciones según tus campos
        ]);

        // Obtener el auto seleccionado
        $auto = Auto::findOrFail($request->auto_id);
        $auto->fill(['disponible' => false]);

        // Crear un nuevo despacho
        $despacho = new Despacho([
            'fecha_entrega' => $request->fecha_entrega,
            // Agrega más campos según tus necesidades
        ]);

        $despacho->save();

        // Asociar el despacho al auto
        $auto->despacho()->associate($despacho);
        $auto->update(['estadodes' => 'Despachado']);

        $unidad = unidad::findOrFail($auto->unidad_id);
        $unidad->decrement('cstock');

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
