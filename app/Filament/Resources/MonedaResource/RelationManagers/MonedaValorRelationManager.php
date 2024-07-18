<?php

namespace App\Filament\Resources\MonedaResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MonedaValorRelationManager extends RelationManager
{
    protected static string $relationship = 'valoresMonedas';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('valor')
                ->required()
                ->autocomplete('off')
                ->type('number')
                ->numeric()
                ->prefix('CLP'),
                Forms\Components\TextInput::make('fecha')
                ->label('Fecha')
                ->required()
                ->autocomplete('off')
                ->type('date'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('Historial Valor')
            ->columns([
                Tables\Columns\TextColumn::make('valor'),
                Tables\Columns\TextColumn::make('fecha')
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
