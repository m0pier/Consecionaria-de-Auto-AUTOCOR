<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detalle extends Model
{
    use HasFactory;

    protected $fillable = ['auto_id', 'venta_id', 'precio_total', 'cantidad'];

    public function auto()
    {
        return $this->belongsTo(Auto::class);
    }

    public function venta()
    {
        return $this->belongsTo(Venta::class);
    }

}
