<?php

namespace App\Http\Controllers;

use App\Models\cliente;
use Illuminate\Http\Request;

class clienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = cliente::all();
        return view('registroclientes.listcliente', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('registroclientes.addcliente');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validacion = $request->validate([
            'nombre' => 'required|string|max:20',
            'cedula' => 'required|string|min:10',
            'email' => 'required|string|max:70',
            'telefono' => 'required|string|min:10',

        ]);

        $cliente = new cliente();

        $cliente->nombre = $request->input('nombre');
        $cliente->cedula = $request->input('cedula');
        $cliente->email = $request->input('email');
        $cliente->telefono = $request->input('telefono');

        $cliente->save();

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
        $cliente = cliente::find($id);

        return view('registroclientes.editcliente', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cliente = cliente::find($id); 

        $cliente->nombre = $request->input('nombre');
        $cliente->cedula = $request->input('cedula');
        $cliente->email = $request->input('email');
        $cliente->telefono = $request->input('telefono');

        $cliente->save(); 

        return back()->with('message', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cliente = cliente::find($id); // Asegúrate de usar el modelo Auto
        $cliente->delete();
        return back();
    }
}
