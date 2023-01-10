<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'categorias_id',
        'nombre',
        
        
    ];
    public function categorias()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function recetas()
    {
        return $this->belongsTo(Receta::class);
    }

     public function salidas()
    {
        return $this->hasMany(Salida::class);
    }
}
