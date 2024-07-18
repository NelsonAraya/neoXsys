<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CentroCostoResource\Pages;
use App\Filament\Resources\CentroCostoResource\RelationManagers;
use App\Models\CentroCosto;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Validation\Rule;

class CentroCostoResource extends Resource
{
    protected static ?string $model = CentroCosto::class;
    protected static ?string $navigationGroup ='Finanzas Mantenedor';
    protected static ?string $navigationIcon = 'heroicon-c-scale';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\TextInput::make('nombre')
            ->required()
            ->maxLength(255)
            ->autocomplete('off')
            ->afterStateUpdated(function ($state, $set) { //guardo la primera del texto completo
                $set('nombre', ucwords(strtolower($state)));
            }),
            Forms\Components\TextInput::make('codigo')
            ->required()
            ->maxLength(255)
            ->autocomplete('off')
            ->afterStateUpdated(function ($state, $set) { //guardo el texto en mayuscula
                $set('codigo', strtoupper($state));
            })
            ->rules([
                'required',
                Rule::unique('centro_costos', 'codigo')->ignore(request()->route('id')), // Asumiendo que el ID del recurso se pasa como parámetro en la URL
            ])
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id'),
                Tables\Columns\TextColumn::make('nombre')
                ->searchable(),
                Tables\Columns\TextColumn::make('codigo')
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
            'index' => Pages\ListCentroCostos::route('/'),
            'create' => Pages\CreateCentroCosto::route('/create'),
            'edit' => Pages\EditCentroCosto::route('/{record}/edit'),
        ];
    }
}
