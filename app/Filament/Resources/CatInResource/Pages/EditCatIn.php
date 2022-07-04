<?php

namespace App\Filament\Resources\CatInResource\Pages;

use App\Filament\Resources\CatInResource;
use Filament\Resources\Pages\EditRecord;

class EditCatIn extends EditRecord
{
    protected function getTitle(): string
    {
        return 'Editar Categorias';
    }

    protected static string $resource = CatInResource::class;
}
