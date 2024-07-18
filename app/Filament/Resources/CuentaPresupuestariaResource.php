<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CuentaPresupuestariaResource\Pages;
use App\Filament\Resources\CuentaPresupuestariaResource\RelationManagers;
use App\Models\CuentaPresupuestaria;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Validation\Rule;

class CuentaPresupuestariaResource extends Resource
{
    protected static ?string $model = CuentaPresupuestaria::class;
    protected static ?string $navigationGroup ='Finanzas';
    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id')
                ->required()
                ->autocomplete('off')
                ->rules([
                    'required',
                    Rule::unique('cuenta_presupuestarias', 'id')->ignore(request()->route('record')), 
                ]),
                Forms\Components\TextInput::make('nombre')
                ->required()
                ->maxLength(255)
                ->autocomplete('off')
                ->afterStateUpdated(function ($state, $set) { //guardo la primera del texto completo
                    $set('nombre', ucwords(strtolower($state)));
                })
            ]);
            
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                ->searchable(),
                Tables\Columns\TextColumn::make('nombre')
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
            'index' => Pages\ListCuentaPresupuestarias::route('/'),
            'create' => Pages\CreateCuentaPresupuestaria::route('/create'),
            'edit' => Pages\EditCuentaPresupuestaria::route('/{record}/edit'),
        ];
    }
}
