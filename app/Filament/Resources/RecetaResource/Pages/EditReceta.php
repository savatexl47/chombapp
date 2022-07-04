<?php

namespace App\Filament\Resources\RecetaResource\Pages;

use App\Filament\Resources\RecetaResource;
use Filament\Resources\Pages\EditRecord;

class EditReceta extends EditRecord
{
    protected function getTitle(): string
    {
        return 'Editar Receta';
    }

    protected static string $resource = RecetaResource::class;
}
