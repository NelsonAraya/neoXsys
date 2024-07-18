<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AfpResource\Pages;
use App\Filament\Resources\AfpResource\RelationManagers;
use App\Models\Afp;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AfpResource extends Resource
{
    protected static ?string $model = Afp::class;
    protected static ?string $navigationGroup ='RRHH';
    protected static ?string $navigationIcon = 'heroicon-o-building-office';

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
            'index' => Pages\ListAfps::route('/'),
            'create' => Pages\CreateAfp::route('/create'),
            'edit' => Pages\EditAfp::route('/{record}/edit'),
        ];
    }
}
