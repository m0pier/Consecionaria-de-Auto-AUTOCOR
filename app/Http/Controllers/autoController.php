<?php

namespace App\Http\Controllers;

use App\Models\auto;
use App\Models\despacho;
use App\Models\estado;
use App\Models\motor;
use App\Models\unidad;
use Illuminate\Http\Request;

class autoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $autos = auto::all();
        return view('registrosAutos.listauto', compact('autos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $unidades = unidad::all();
        $estados = estado::all();
        $motors = motor::all();
        return view('registrosAutos.addauto', compact('unidades', 'estados', 'motors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'chasis' => 'required|string|min:17|unique:autos,chasis',
            'motor_serie' => 'required|string|min:12|unique:autos,motor_serie',
            'anio' => 'required|numeric',
            'precio' => 'required|numeric',
            'km' => 'required|numeric',
            'color' => 'required|string|max:90',
            'placa' => 'required|string|min:8|unique:autos,placa',
            'transmision' => 'required|string',
        ]);

        $unidad = unidad::find($request->unidad_id);

        if (!$unidad) {
            return back()->with('message', 'La unidad seleccionada no existe.');
        }

        $auto = new auto();

        $auto->unidad_id = $request->unidad_id;
        $auto->chasis = $request->chasis;
        $auto->motor_serie = $request->motor_serie;
        $auto->anio = $request->anio;
        $auto->precio = $request->precio;
        $auto->color = $request->color;
        $auto->km = $request->km;
        $auto->estado_id = $request->estado_id;
        $auto->placa = $request->placa;
        $auto->motor_id = $request->motor_id;
        $auto->transmision = $request->transmision;
        $auto->disponible = true;
        // Guarda ambos en la base de datos
        $auto->save();

        // Crea un nuevo despacho asociado al auto
        $auto->despacho()->create(['estadodes' => true]);

        $unidad->cstock++;
        $unidad->save();
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
        $unidades = unidad::all();
        $estados = estado::all();
        $motors = motor::all();
        $auto = auto::find($id);

        return view('registrosAutos.editauto', compact('auto', 'estados', 'motors', 'unidades', 'despacho'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Obtener el auto antes de la actualización
        $auto = Auto::find($id);

        if (!$auto) {
            return back()->with('message', 'El auto no existe.');
        }

        // Obtener la unidad original del auto antes de la actualización
        $unidadOriginal = $auto->unidad;

        // Restar al stock de la unidad original
        if ($unidadOriginal) {
            $unidadOriginal->cstock--;
            $unidadOriginal->save();
        }

        // Obtener la nueva unidad
        $unidadNueva = Unidad::find($request->unidad_id);

        if (!$unidadNueva) {
            return back()->with('message', 'La nueva unidad seleccionada no existe.');
        }

        $auto->update([
            'unidad_id' => $request->unidad_id,
            'chasis' => $request->chasis,
            'motor_serie' => $request->motor_serie,
            'anio' => $request->anio,
            'precio' => $request->precio,
            'color' => $request->color,
            'km' => $request->km,
            'estado_id' => $request->estado_id,
            'placa' => $request->placa,
            'motor_id' => $request->motor_id,
            'transmision' => $request->transmision,
        ]);

        // Aumentar el stock de la nueva unidad
        $unidadNueva->cstock++;
        $unidadNueva->save();

        return back()->with('message', 'Actualizado correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $auto = auto::find($id);

        if ($auto->despacho && $auto->despacho->estado_des) {
            return back()->with('error', 'No puedes eliminar un auto que está vendido.');
        }

        $auto->delete();

        return back();
    }
}
