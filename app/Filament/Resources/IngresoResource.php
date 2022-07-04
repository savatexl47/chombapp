<?php

namespace App\Filament\Resources;

use App\Filament\Resources\IngresoResource\Pages;
use App\Filament\Resources\IngresoResource\RelationManagers;
use App\Models\Ingreso;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Forms\Components\DatePicker;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class IngresoResource extends Resource
{
    protected static ?string $model = Ingreso::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('tipo_comprobante')->required(),
                Forms\Components\TextInput::make('serie')->required(),
                Forms\Components\TextInput::make('numero_comprobante')->required(),
                DatePicker::make('fecha')->format('Y-m-d')->displayFormat('d/m/Y'),
                Forms\Components\TextInput::make('igv')->required(),
                Forms\Components\TextInput::make('total')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tipo_comprobante')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('serie'),
                Tables\Columns\TextColumn::make('num_comprobante'),
                Tables\Columns\TextColumn::make('fecha'),
                Tables\Columns\TextColumn::make('igv'),
                Tables\Columns\TextColumn::make('total'),
            ])
            ->filters([
                //
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListIngresos::route('/'),
            'create' => Pages\CreateIngreso::route('/create'),
            'edit' => Pages\EditIngreso::route('/{record}/edit'),
        ];
    }
}
