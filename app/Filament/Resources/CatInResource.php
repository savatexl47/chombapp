<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CatInResource\Pages;
use App\Filament\Resources\CatInResource\RelationManagers;
use App\Models\CatIn;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class CatInResource extends Resource
{
    protected static ?string $model = CatIn::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';

    protected static ?string $navigationGroup = 'Insumos';

    protected static ?string $navigationLabel = 'Categorias';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre')->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre')->sortable()->searchable()
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
            'index' => Pages\ListCatIns::route('/'),
            'create' => Pages\CreateCatIn::route('/create'),
            'edit' => Pages\EditCatIn::route('/{record}/edit'),
        ];
    }
}
