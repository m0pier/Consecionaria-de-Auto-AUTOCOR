<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class unidad extends Model
{
    use HasFactory;
    protected $fillable = ['marca', 'modelo', 'tipo_auto', 'imagen', 'cstock'];
}
