<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class despacho extends Model
{
    use HasFactory;

    protected $fillable = ['estado_des', 'fecha_entrega'];

    public function auto()
    {
        return $this->hasOne(auto::class);
    }
}
