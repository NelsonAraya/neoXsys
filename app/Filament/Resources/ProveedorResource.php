<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProveedorResource\Pages;
use App\Filament\Resources\ProveedorResource\RelationManagers;
use App\Models\Proveedor;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProveedorResource extends Resource
{
    protected static ?string $model = Proveedor::class;
    protected static ?string $navigationGroup ='Finanzas Mantenedor';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('rut_completo')
                ->label('Rut Proveedor')
                ->required()
                ->maxLength(12)
                ->autocomplete('off'),
                Forms\Components\TextInput::make('id')
                ->disabled()
                ->hidden()
                ->dehydrated(true), // Asegura que el campo se guarde en la base de datos
                Forms\Components\TextInput::make('dv')
                ->disabled()
                ->hidden()
                ->dehydrated(true),
                Forms\Components\TextInput::make('nombre')
                ->label('Nombre Proveedor')
                ->required()
                ->maxLength(255)
                ->autocomplete('off')
                ->afterStateUpdated(function ($state, $set) { 
                    $set('nombre', ucwords(strtolower($state)));
                }),
                Forms\Components\TextInput::make('direccion')
                ->label('Direccion Proveedor')
                ->required()
                ->maxLength(255)
                ->autocomplete('off')
                ->afterStateUpdated(function ($state, $set) { 
                    $set('direccion', ucwords(strtolower($state)));
                }),
                Forms\Components\TextInput::make('ciudad')
                ->label('Ciudad Proveedor')
                ->required()
                ->maxLength(255)
                ->autocomplete('off')
                ->afterStateUpdated(function ($state, $set) { 
                    $set('ciudad', ucwords(strtolower($state)));
                }),
                Forms\Components\TextInput::make('contacto')
                ->label('Nombre Contacto')
                ->required()
                ->maxLength(255)
                ->autocomplete('off')
                ->afterStateUpdated(function ($state, $set) { 
                    $set('contacto', ucwords(strtolower($state)));
                }),
                Forms\Components\TextInput::make('telefono')
                ->label('Telefono Proveedor')
                ->required()
                ->type('number')
                ->numeric()
                ->autocomplete('off'),
                Forms\Components\TextInput::make('mail_pagos')
                ->label('Mail Pagos')
                ->required()
                ->type('email')
                ->email()  // Valida que el formato sea un correo electrónico
                ->autocomplete('off')
                ->placeholder('pagos@empresa.cl'),
                Forms\Components\TextInput::make('mail_contacto')
                ->label('Mail Contacto')
                ->required()
                ->type('email')
                ->email()  // Valida que el formato sea un correo electrónico
                ->autocomplete('off')
                ->placeholder('contacto@empresa.cl'),
                Forms\Components\Select::make('banco_id')
                ->label('Banco')
                ->relationship('banco','nombre')
                ->preload()
                ->searchable()  // Permite buscar en el select
                ->required(),  // Hace que el campo sea obligatorio
                Forms\Components\Select::make('banco_cuenta_tipo_id')
                ->label('Tipo de Cuenta')
                ->relationship('bancocuentatipo','nombre')
                ->preload()
                ->searchable()  // Permite buscar en el select
                ->required(),  // Hace que el campo sea obligatorio
                Forms\Components\TextInput::make('numero_cuenta')
                ->label('Numero Cuenta')
                ->required()
                ->type('number')
                ->numeric()
                ->autocomplete('off'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('run_completo'),
                Tables\Columns\TextColumn::make('nombre')
                ->searchable(),
                Tables\Columns\TextColumn::make('direccion')
                ->searchable(),
                Tables\Columns\TextColumn::make('ciudad')
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
            'index' => Pages\ListProveedors::route('/'),
            'create' => Pages\CreateProveedor::route('/create'),
            'edit' => Pages\EditProveedor::route('/{record}/edit'),
        ];
    }
}
