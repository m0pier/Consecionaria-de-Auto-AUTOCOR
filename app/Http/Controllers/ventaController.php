<?php

namespace App\Http\Controllers;

use App\Models\Auto;
use App\Models\Cliente;
use App\Models\Detalle;
use App\Models\Venta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VentaController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        $autos = Auto::all();
        $detalles = Detalle::all();
        $ventas = Venta::all();

        return view('registroventas.listventa', compact('clientes', 'autos', 'detalles', 'ventas'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clientes = Cliente::all();
        $autos = Auto::where('disponible', true)->get();

        return view('registroventas.addventa', compact('clientes', 'autos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'fecha_venta' => 'required|date',
            'auto_id' => 'required|array',
        ]);

        // Crear la venta
        $venta = new Venta();
        $venta->cliente_id = $request->cliente_id;
        $venta->fecha_venta = $request->fecha_venta;
        $venta->save();

        // Obtener los autos seleccionados
        $autosSeleccionados = $request->auto_id;

        // Variable para acumular el precio total de la venta
        $totalVenta = 0;

        // Guardar detalles de la venta para cada auto seleccionado
        foreach ($autosSeleccionados as $autoId) {
            try {
                // Verificar si el auto está disponible
                $auto = Auto::findOrFail($autoId);

                if (!$auto->disponible || ($auto->despacho && $auto->despacho->estadodes === false)) {
                    continue; // Saltar a la siguiente iteración del bucle si el auto no está disponible
                }

                $detalle = new Detalle();
                $detalle->auto_id = $autoId;
                $detalle->venta_id = $venta->id; // Asociar el detalle con la venta recién creada

                // Obtener el precio total del auto utilizando la relación
                $precioTotalAuto = $this->getPrecioTotalDelAuto($autoId);
                $totalVenta += $precioTotalAuto; // Acumular el precio total en la venta

                $detalle->precio_total = $precioTotalAuto;
                $detalle->cantidad = 1; // Puedes ajustar según tus necesidades
                $detalle->save();

                // Marcar el auto como no disponible
                $auto->fill(['disponible' => false]);
                $auto->save();
            } catch (\Exception $e) {
                // Manejar la excepción si el auto no se encuentra
                // Esto puede ser útil para manejar casos inesperados
                // Puedes agregar un log, mensaje de error, etc.
                continue; // Saltar a la siguiente iteración del bucle
            }
        }

        return back()->with('message', 'ok');
    }

    private function getPrecioTotalDelAuto($autoId)
    {
        $auto = Auto::find($autoId);

        // Ajusta esto según tu lógica para calcular el precio total del auto
        return $auto->precio; // Solo el precio del auto
    }

    public function destroy($id)
    {      
        $venta = Venta::find($id);

        // Obtener los detalles de la venta
        $detallesVenta = Detalle::where('venta_id', $venta->id)->get();

        foreach ($detallesVenta as $detalle) {
            // Obtener el auto asociado al detalle
            $auto = Auto::find($detalle->auto_id);

            // Marcar el auto como disponible
            $auto->update(['disponible' => true]);

            // Eliminar el detalle
            $detalle->delete();
        }

        // Eliminar la venta
        $venta->delete();

        return back();
    }
}
