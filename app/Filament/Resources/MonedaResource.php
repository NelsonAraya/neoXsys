<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MonedaResource\Pages;
use App\Filament\Resources\MonedaResource\RelationManagers;
use App\Models\Moneda;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Validation\Rule;

class MonedaResource extends Resource
{
    protected static ?string $model = Moneda::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

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
                ->autocomplete('off')
                ->afterStateUpdated(function ($state, $set) { 
                    $set('codigo', strtoupper($state));
                })
                ->rules([
                    'required',
                    Rule::unique('monedas', 'codigo')->ignore(request()->route('record')), 
                ]),
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
            'index' => Pages\ListMonedas::route('/'),
            'create' => Pages\CreateMoneda::route('/create'),
            'edit' => Pages\EditMoneda::route('/{record}/edit'),
        ];
    }
}
