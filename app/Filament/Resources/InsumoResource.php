<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InsumoResource\Pages;
use App\Filament\Resources\InsumoResource\RelationManagers;
use App\Models\Insumo;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\BelongsToSelect;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
//use Filament\Forms\Components\Grid;

class InsumoResource extends Resource
{
    protected static ?string $model = Insumo::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'Insumos';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                BelongsToSelect::make('cat_ins_id')->relationship('cat_ins', 'nombre')->label(label:'Categoria'),
                Forms\Components\TextInput::make('nombre')->required(),
                Forms\Components\TextInput::make('marca')->required(),
                //Forms\Components\TextInput::make('presentacion')->required(),
                //DatePicker::make('vencimiento')->format('Y-m-d')->displayFormat('d/m/Y'),
                Forms\Components\TextInput::make('unidad_compra')->required(),
                Forms\Components\TextInput::make('precio_compra')->required(),
                Forms\Components\TextInput::make('stock')->required(),
                Forms\Components\TextInput::make('stock_min')->required(),
                Forms\Components\TextInput::make('stock_max')->required(),
                Forms\Components\TextInput::make('costo_min')->required(),
                Forms\Components\TextInput::make('costo_max')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('cat_ins.nombre')->label(label:'Categoria'),
                Tables\Columns\TextColumn::make('nombre')->searchable(),
                Tables\Columns\TextColumn::make('marca'),
                //Tables\Columns\TextColumn::make('presentacion'),
                //Tables\Columns\TextColumn::make('vencimiento'),
                Tables\Columns\TextColumn::make('unidad_compra')->limit(10),
                Tables\Columns\TextColumn::make('precio_compra')->limit(10),
                Tables\Columns\TextColumn::make('stock'),
                Tables\Columns\TextColumn::make('stock_min'),
                Tables\Columns\TextColumn::make('stock_max'),
                Tables\Columns\TextColumn::make('costo_min'),
                Tables\Columns\TextColumn::make('costo_max'),
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
            'index' => Pages\ListInsumos::route('/'),
            'create' => Pages\CreateInsumo::route('/create'),
            'edit' => Pages\EditInsumo::route('/{record}/edit'),
        ];
    }
}
