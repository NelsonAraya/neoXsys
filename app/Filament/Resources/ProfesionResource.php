<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProfesionResource\Pages;
use App\Filament\Resources\ProfesionResource\RelationManagers;
use App\Models\Profesion;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProfesionResource extends Resource
{
    protected static ?string $model = Profesion::class;
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
                Forms\Components\Select::make('categoria')
                ->label('Categoria Salud')
                ->options([
                    'A' => 'A',
                    'B' => 'B',
                    'C' => 'C',
                    'D' => 'D',
                    'E' => 'E',
                    'F' => 'F',
                ])
                ->required(), 
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre')
                ->searchable(),
                Tables\Columns\TextColumn::make('categoria')
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
            'index' => Pages\ListProfesions::route('/'),
            'create' => Pages\CreateProfesion::route('/create'),
            'edit' => Pages\EditProfesion::route('/{record}/edit'),
        ];
    }
}
