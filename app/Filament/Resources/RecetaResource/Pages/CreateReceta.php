<?php

namespace App\Filament\Resources\RecetaResource\Pages;

use App\Filament\Resources\RecetaResource;
use Filament\Resources\Pages\CreateRecord;

class CreateReceta extends CreateRecord
{
    protected function getTitle(): string
    {
        return 'Crear Receta';
    }

    protected static string $resource = RecetaResource::class;
}