<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PrevisionResource\Pages;
use App\Filament\Resources\PrevisionResource\RelationManagers;
use App\Models\Prevision;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PrevisionResource extends Resource
{
    protected static ?string $model = Prevision::class;
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
                ->afterStateUpdated(function ($state, $set) { //guardo la primera en mayuscula
                    $set('nombre', ucfirst($state));
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
            'index' => Pages\ListPrevisions::route('/'),
            'create' => Pages\CreatePrevision::route('/create'),
            'edit' => Pages\EditPrevision::route('/{record}/edit'),
        ];
    }
}
