<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salida extends Model
{
    use HasFactory;

    protected $fillable = [
        'productos_id',
        'cantidad',
                
    ];
    public function productos()
    {
        return $this->belongsTo(Producto::class);
    }
}

