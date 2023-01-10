<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
    use HasFactory;

    protected $fillable = [
        'insumos_id',
        'precio_compra',
        'stock',
        'stock_min',
        'stock_max',
        'costo_min',
        'costo_max',
        'stock_add',
        'costo_actual',
        'proveedors_id',
        'observaciones',
        'fecha',
        
    ];

     public function insumos()
    {
        return $this->belongsTo(Insumo::class);//hasMany
    }

     public function proveedors()
    {
        return $this->belongsTo(Proveedor::class);//hasMany
    }
}
