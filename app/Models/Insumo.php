<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insumo extends Model
{
    use HasFactory;

    protected $fillable = [
        'cat_ins_id',
        'nombre',
        'marca',
        'unidad_compra',
        'precio_compra',
        'stock',
        'stock_min',
        'stock_max',
        'costo_min',
        'costo_max',
        'merma',

    ];
    public function cat_ins()
    {
        return $this->belongsTo(CatIn::class);
    }

    public function recetas()
    {
        return $this->hasMany(Receta::class);//belongsTo
    }

    public function ingresos()
    {
        return $this->belongsTo(Ingreso::class);//belongsTo
    }
}
