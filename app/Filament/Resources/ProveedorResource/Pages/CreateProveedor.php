<?php

namespace App\Filament\Resources\ProveedorResource\Pages;

use App\Filament\Resources\ProveedorResource;
use Filament\Resources\Pages\CreateRecord;

class CreateProveedor extends CreateRecord
{
    protected function getTitle(): string
    {
        return 'Crear Proveedores';
    }

    protected static string $resource = ProveedorResource::class;
}
