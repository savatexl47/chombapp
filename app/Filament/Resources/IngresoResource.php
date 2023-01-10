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
use Filament\Forms\Components\BelongsToSelect;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use App\Models\Insumo;
use App\Models\Proveedor;
use Filament\Forms\Components\Textarea;

//global $stockAn;
//$stockAn = '';

class IngresoResource extends Resource
{
    
    public $stockAn;

    protected static ?string $model = Ingreso::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';

    public static function form(Form $form): Form

    {
        return $form
            ->schema([
                
                Select::make('insumos_id')
                ->label('Insumo')
                ->searchable()
                ->options(Insumo::all()->pluck('nombre', 'id')->toArray())
                ->afterStateUpdated(function ($set, $state)  {
                        
                        $stockAn = $state;
                        $set('stock', Insumo::find($state)->stock);
                        $set('stock_min', Insumo::find($state)->stock_min);
                        $set('stock_max', Insumo::find($state)->stock_max);
                        $set('costo_min', Insumo::find($state)->costo_min);
                        $set('costo_max', Insumo::find($state)->costo_max);
                        $set('precio_compra', Insumo::find($state)->precio_compra);
                })
                ->reactive(),
                
                
                TextInput::make('stock')->label(label:'Stock')->suffix('Automatico al Seleccionar Insumo')->required(),

                TextInput::make('stock_min')->label(label:'Stock Mínimo')->suffix('Automatico al Seleccionar Insumo')->required()->disabled(),
                TextInput::make('stock_max')->label(label:'Stock Máximo')->suffix('Automatico al Seleccionar Insumo')->required()->disabled(),

                TextInput::make('costo_min')->label(label:'Costo Mínimo')->suffix('Automatico al Seleccionar Insumo')->required()->disabled(),
                TextInput::make('costo_max')->label(label:'Costo Máximo')->suffix('Automatico al Seleccionar Insumo')->required()->disabled(),

                TextInput::make('precio_compra')->label(label:'Costo')->suffix('Automatico al Seleccionar Insumo')->required()->disabled(),
                
                DatePicker::make('fecha')->format('Y-m-d')->displayFormat('d/m/Y')
                ->default(now())->disabled(),
                TextInput::make('costo_actual')->label(label:'Costo Actual')
                ->afterStateUpdated(function ($set, $state) {
                    $set('precio_compra', $state); //(iguala el valor de un campo a otro)
                })
                ->reactive()
                ->numeric()->required(),
                
                TextInput::make('stock_add')->label(label:'Ingrese Stock')
                        
                ->afterStateUpdated(function ($set, $get,  $state) {
                $stockNew =  Insumo::find($get('insumos_id'))?->stock ?? 0;
                // the rest of you calculation
                $set('stock', intval($stockNew) + intval($state));
                })
                ->reactive() 
                ->numeric()->required(),
                

                Textarea::make('observaciones')->rows(2),
                BelongsToSelect::make('proveedors_id')->label(label:'Proveedores')->relationship('proveedors', 'nombre')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('insumos.nombre'),
                Tables\Columns\TextColumn::make('precio_compra')->label(label:'Costo porcion')->limit(10),
                Tables\Columns\TextColumn::make('stock'),
                Tables\Columns\TextColumn::make('stock_min'),
                Tables\Columns\TextColumn::make('stock_max'),
                Tables\Columns\TextColumn::make('costo_min'),
                Tables\Columns\TextColumn::make('costo_max'),
                Tables\Columns\TextColumn::make('proveedors.nombre')->label(label:'Proveedores'),
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
