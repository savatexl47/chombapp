<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    use HasFactory;

    protected $fillable = [
        'productos_id',
        'insumos_id',
        'unidad_compra',
        'precio_compra',
        'costo_porcion',
        'unidad_medida',
        'equivalencia',
        'cantidad',
        
    ];

    public function productos()
    {
        return $this->belongsTo(Producto::class);
    }

    public function insumos()
    {
        return $this->belongsTo(Insumo::class);//hasMany
    }
}
