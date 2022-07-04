<?php

namespace App\Filament\Resources\ProveedorResource\Pages;

use App\Filament\Resources\ProveedorResource;
use Filament\Resources\Pages\EditRecord;

class EditProveedor extends EditRecord
{
    protected function getTitle(): string
    {
        return 'Editar Proveedores';
    }

    protected static string $resource = ProveedorResource::class;
}
