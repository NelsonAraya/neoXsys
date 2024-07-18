<?php

namespace App\Filament\Resources\CuentaPresupuestariaResource\Pages;

use App\Filament\Resources\CuentaPresupuestariaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCuentaPresupuestarias extends ListRecords
{
    protected static string $resource = CuentaPresupuestariaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
