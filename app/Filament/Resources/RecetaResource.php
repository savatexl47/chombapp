<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RecetaResource\Pages;
use App\Filament\Resources\RecetaResource\RelationManagers;
use App\Models\Receta;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Forms\Components\BelongsToSelect;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Table;
use Filament\Tables;
use App\Models\Insumo;

class RecetaResource extends Resource
{
    //public $insumos_id;
    //public $unidad_compra;
    //public $precio_compra;
    
    protected static ?string $model = Receta::class;

    protected static ?string $navigationIcon = 'heroicon-o-pencil-alt';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                BelongsToSelect::make('productos_id')->relationship('productos', 'nombre'),
                
                //This Select gets all Insumos from a table and show them by name
 
                Select::make('insumos_id')
                ->label('Insumo')
                ->options(Insumo::all()->pluck('nombre', 'id')->toArray())
                ->reactive()
                ->afterStateUpdated(fn (callable $set) => $set ('unidad_compra', 'precio_compra')),
                
                Select::make('unidad_compra')
                ->label(label:'Unidad Compra')
                ->options(function (callable $get){
                    $insumo = Insumo::find($get('id'));
 
                    if (! $insumo) {
                        return Insumo::pluck('unidad_compra', 'id');
                        
                    }
 
                    return $insumo->recetas->pluck('unidad_compra','id');
                    
                }),
 
                                
                Select::make('precio_compra')
                ->label(label:'Precio Compra')
                ->options(function (callable $get){
                    $insumo = Insumo::find($get('id'));
 
                    if (! $insumo) {
                        
                        return Insumo::pluck('precio_compra', 'id');
                  
                    }
 
                    return $insumo->recetas->pluck('precio_compra','id');
                    
                }),
                
                Forms\Components\TextInput::make('costo_porcion')->required(),
                Forms\Components\TextInput::make('unidad_medida')->required(),
                Forms\Components\TextInput::make('equivalencia')->required(),
                Forms\Components\TextInput::make('cantidad')->required(),
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('productos.nombre'),
                Tables\Columns\TextColumn::make('insumos.nombre'),
                Tables\Columns\TextColumn::make('insumos.unidad_compra')->label(label:'Unidad Compra'),
                Tables\Columns\TextColumn::make('insumos.precio_compra')->label(label:'Precio Compra'),
                Tables\Columns\TextColumn::make('costo_porcion'),
                Tables\Columns\TextColumn::make('unidad_medida'),
                Tables\Columns\TextColumn::make('equivalencia'),
                Tables\Columns\TextColumn::make('cantidad'),
                
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
            'index' => Pages\ListRecetas::route('/'),
            'create' => Pages\CreateReceta::route('/create'),
            'edit' => Pages\EditReceta::route('/{record}/edit'),
        ];
    }
}
