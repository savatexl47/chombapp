<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo_comprobante',
        'serie',
        'numero_comprobante',
        'fecha',
        'igv',
        'total',
        
    ];
}
