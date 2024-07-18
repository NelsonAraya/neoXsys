<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FondoResource\Pages;
use App\Filament\Resources\FondoResource\RelationManagers;
use App\Models\Fondo;
use App\Models\Departamento;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FondoResource extends Resource
{
    protected static ?string $model = Fondo::class;
    protected static ?string $navigationGroup ='Finanzas Mantenedor';
    protected static ?string $navigationIcon = 'heroicon-o-credit-card';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre')
                ->label('Nombre Fondo')
                ->required()
                ->maxLength(255)
                ->autocomplete('off')
                ->afterStateUpdated(function ($state, $set) { 
                    $set('nombre', ucwords(strtolower($state)));
                }),
                Forms\Components\TextInput::make('monto')
                ->required()
                ->autocomplete('off')
                ->type('number')
                ->numeric(),
                Forms\Components\TextInput::make('anio')
                ->label('Año Fondo')
                ->required()
                ->autocomplete('off')
                ->type('number')
                ->numeric()
                ->minValue(1900)  // Valor mínimo permitido (puedes ajustarlo según tus necesidades)
                ->maxValue(date('Y'))  // Valor máximo permitido (el año actual)
                ->placeholder('Ingrese el año'),
                Forms\Components\TextInput::make('nombre_completo')
                ->label('Nombre Fondo Completo')
                ->required()
                ->maxLength(255)
                ->autocomplete('off')
                ->afterStateUpdated(function ($state, $set) { 
                    $set('nombre_completo', ucwords(strtolower($state)));
                }),
                Forms\Components\Select::make('departamento_id')
                ->label('Departamento')
                ->relationship('departamento','nombre')
                ->preload()
                //->options(Departamento::all()->pluck('nombre', 'id')->toArray())  // Asumiendo que 'nombre' es el campo que deseas mostrar
                ->searchable()  // Permite buscar en el select
                ->required(),  // Hace que el campo sea obligatorio
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id'),
                Tables\Columns\TextColumn::make('nombre')
                ->searchable(),
                Tables\Columns\TextColumn::make('anio')
                ->searchable(),
                Tables\Columns\TextColumn::make('monto')
                ->searchable(),
                Tables\Columns\TextColumn::make('departamento.nombre')
                ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListFondos::route('/'),
            'create' => Pages\CreateFondo::route('/create'),
            'edit' => Pages\EditFondo::route('/{record}/edit'),
        ];
    }
}
