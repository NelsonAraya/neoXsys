<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BancoCuentaTipoResource\Pages;
use App\Filament\Resources\BancoCuentaTipoResource\RelationManagers;
use App\Models\BancoCuentaTipo;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BancoCuentaTipoResource extends Resource
{
    protected static ?string $model = BancoCuentaTipo::class;
    protected static ?string $navigationGroup ='Finanzas Mantenedor';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre')
                ->label('Nombre Tipo Cuenta')
                ->required()
                ->maxLength(255)
                ->autocomplete('off')
                ->afterStateUpdated(function ($state, $set) { 
                    $set('nombre', ucwords(strtolower($state)));
                })
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
            'index' => Pages\ListBancoCuentaTipos::route('/'),
            'create' => Pages\CreateBancoCuentaTipo::route('/create'),
            'edit' => Pages\EditBancoCuentaTipo::route('/{record}/edit'),
        ];
    }
}
