<?php

namespace App\Filament\Resources\ProveedorResource\Pages;

use App\Filament\Resources\ProveedorResource;
use Filament\Resources\Pages\ListRecords;

class ListProveedors extends ListRecords
{
    protected function getTitle(): string
    {
        return 'Proveedores';
    }

    protected static string $resource = ProveedorResource::class;
}
