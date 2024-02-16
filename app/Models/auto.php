<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class auto extends Model
{
    use HasFactory;
    protected $fillable = ['unidad_id', 'chasis', 'motor_serie', 'km', 'color', 'anio', 'precio', 'transmision', 'placa', 'disponible','despacho_id', 'motor_id', 'estado_id'];

    public function unidad()
    {
        return $this->belongsTo(Unidad::class);
    }

    public function motor()
    {
        return $this->belongsTo(Motor::class);
    }

    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }

    public function despacho()
    {
        return $this->belongsTo(Despacho::class);
    }

}
