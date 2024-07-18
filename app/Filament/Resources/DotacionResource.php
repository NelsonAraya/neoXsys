<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DotacionResource\Pages;
use App\Filament\Resources\DotacionResource\RelationManagers;
use App\Models\Dotacion;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DotacionResource extends Resource
{
    protected static ?string $model = Dotacion::class;
    protected static ?string $navigationGroup ='RRHH Mantenedor';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre')
                ->required()
                ->maxLength(255)
                ->autocomplete('off')
                ->afterStateUpdated(function ($state, $set) { 
                    $set('nombre', ucwords(strtolower($state)));
                }),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id'),
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
            'index' => Pages\ListDotacions::route('/'),
            'create' => Pages\CreateDotacion::route('/create'),
            'edit' => Pages\EditDotacion::route('/{record}/edit'),
        ];
    }
}
