<?php

namespace App\Filament\Resources\CatInResource\Pages;

use App\Filament\Resources\CatInResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCatIn extends CreateRecord
{
    
    protected function getTitle(): string
    {
        return 'Crear Categorias';
    }

    protected static string $resource = CatInResource::class;
}
