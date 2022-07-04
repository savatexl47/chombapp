<?php

namespace App\Filament\Resources\CatInResource\Pages;

use App\Filament\Resources\CatInResource;
use Filament\Resources\Pages\ListRecords;

class ListCatIns extends ListRecords
{
    
    protected function getTitle(): string
    {
        return 'Categorias';
    }

    protected static string $resource = CatInResource::class;
}
