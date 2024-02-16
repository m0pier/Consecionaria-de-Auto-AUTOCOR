<?php

namespace App\Http\Controllers;

use App\Models\unidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class unidadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $unidades = unidad::all();
        return view('registrosAutos.addauto', compact('unidades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $unidades = unidad::all();
        return view('registrosAutos.addauto', compact('unidades'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'marca' => 'required|string|max:40',
            'modelo' => 'required|string|max:50',
            'tipo_auto' => 'required|string|max:70',
            'imagen' => 'required',
        ]);

        try {
            $unidad = new Unidad();

            $unidad->marca = $request->marca;
            $unidad->modelo = $request->modelo;
            $unidad->tipo_auto = $request->tipo_auto;
            $unidad->cstock = $request->cstock ?? 0;

            if ($request->hasFile('imagen')) {
                $file = $request->file('imagen');
                $destinationPath = 'images/imagen/';
                $filename = time() . '-' . $file->getClientOriginalName();
                $uploadSuccess = $request->file('imagen')->move($destinationPath, $filename);
                $unidad->imagen = $destinationPath . $filename;
            }

            $unidad->save();

            return back()->with('message', 'ok');
        } catch (\Exception $e) {
            return back()->with('error', 'Error al guardar la unidad');
        }
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
        $unidad = unidad::find($id);
        return view('registrosAutos.edituni', compact('unidad'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $unidad = unidad::find($id);

        $unidad->marca = $request->marca;
        $unidad->modelo = $request->modelo;
        $unidad->tipo_auto = $request->tipo_auto;
        $unidad->cstock = $request->cstock ?? 0;
        
        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');

            // Validar que es una imagen válida
            $request->validate([
                'imagen' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $destinationPath = 'images/imagen/';
            $filename = time() . '-' . $file->getClientOriginalName();

            // Verificar si la carga fue exitosa
            if ($file->move($destinationPath, $filename)) {
                // Eliminar la imagen anterior
                if ($unidad->imagen) {
                    Storage::delete($unidad->imagen);
                }
                // Actualizar el campo imagen
                $unidad->imagen = $destinationPath . $filename;
            } else {
                Log::error('La carga de la imagen falló. Ruta destino: ' . $destinationPath);
            }
        }
        $unidad->save();

        return back()->with('message', 'Actualizado correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $unidad = unidad::find($id);

        $unidad->delete();

        return back();
    }
}
