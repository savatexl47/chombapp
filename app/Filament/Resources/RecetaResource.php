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
//use Closure;
//use Illuminate\Support\Str;

class RecetaResource extends Resource
{
        
    protected static ?string $model = Receta::class;

    protected static ?string $navigationIcon = 'heroicon-o-pencil-alt';

    public static function form(Form $form): Form
    {
        
        return $form
            ->schema([
                BelongsToSelect::make('productos_id')->relationship('productos', 'nombre'),
                
                Select::make('insumos_id')
                ->label('Insumo')
                ->options(Insumo::all()->pluck('nombre', 'id')->toArray())
                ->afterStateUpdated(function ($set, $state) {
                        $set('unidad_compra', Insumo::find($state)->unidad_compra);
                        $set('precio_compra', Insumo::find($state)->precio_compra);
                })
                ->reactive(),
                
                TextInput::make('unidad_compra')->label(label:'Unidad de Compra')->suffix('Automatico al Seleccionar Insumo')->required()->disabled(),

                TextInput::make('precio_compra')->label(label:'Precio de Compra')->suffix('Automatico al Seleccionar Insumo')->required()->disabled(),

                TextInput::make('unidad_medida')->required(),
                
                TextInput::make('equivalencia')->default('1000')->required()->disabled(),
                
                
                TextInput::make('cantidad')
                    
                ->afterStateUpdated(function ($set, $get, $state) {
                // Get the values of the "precio_compra" and "equivalencia" fields
                    $precioCompra = Insumo::find($get('insumos_id'))?->precio_compra ?? 0;
                    $equivalencia = 1000;

                // Calculate the value of the "costo_porcion" field using the formula provided
                    $costoPorcion = ((floatval($state) * floatval($precioCompra)) / $equivalencia);

                // Set the value of the "costo_porcion" field to the calculated value
                    $set('costo_porcion', $costoPorcion);
                }) 
                ->reactive()
                ->required(),
                
                TextInput::make('costo_porcion')                
                ->required()->suffix('Automatico')
                ->disabled(),
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('productos.nombre'),
                Tables\Columns\TextColumn::make('insumos.nombre'),
                //Tables\Columns\TextColumn::make('insumos.unidad_compra')->label(label:'Unidad Compra'),
                //Tables\Columns\TextColumn::make('insumos.precio_compra')->label(label:'Precio Compra'),
                //Tables\Columns\TextColumn::make('costo_porcion'),
                //Tables\Columns\TextColumn::make('unidad_medida'),
                //Tables\Columns\TextColumn::make('equivalencia'),
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
