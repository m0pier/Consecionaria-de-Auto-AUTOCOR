<?php

namespace App\Http\Controllers;

use App\Models\auto;
use App\Models\detalle;
use App\Models\unidad;
use Illuminate\Http\Request;

class DashController extends Controller
{
    public function index()
    {
        // Obtener datos específicos para tu dashboard
        $totalUnidades = Auto::count();
        $autosVendidos = Auto::where('disponible', false)->count();
        $autosEnStock = unidad::sum('cstock');
        $totalIngresos = number_format(detalle::sum('precio_total'), 2);

        // Pasar las variables a la vista
        return view('dashboard', [
            'totalUnidades' => $totalUnidades,
            'autosVendidos' => $autosVendidos,
            'autosEnStock' => $autosEnStock,
            'totalIngresos' => $totalIngresos,
        ]);
    }
}
