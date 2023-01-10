<?php

namespace App\Filament\Resources\SalidaResource\Pages;

use App\Filament\Resources\SalidaResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSalida extends EditRecord
{
    protected static string $resource = SalidaResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
