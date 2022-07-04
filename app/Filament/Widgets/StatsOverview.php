<?php

namespace App\Filament\Widgets;

use App\Models\Producto;
use App\Models\Insumo;
use App\Models\Receta;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class StatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Insumos', Insumo::query()->count()),
            Card::make('Productos', Producto::query()->count()),
            Card::make('Recetas', Receta::query()->count()),
            //Card::make(label: 'Total Productos', Producto::query()->count()),
            //Card::make(label: 'Total Insumos', Insumo::query()->count()),
            //Card::make(label: 'Total Recetas', Receta::query()->count()),
        ];
    }
}
