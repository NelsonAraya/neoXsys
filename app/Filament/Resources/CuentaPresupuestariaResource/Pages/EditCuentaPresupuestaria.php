<?php

namespace App\Filament\Resources\CuentaPresupuestariaResource\Pages;

use App\Filament\Resources\CuentaPresupuestariaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCuentaPresupuestaria extends EditRecord
{
    protected static string $resource = CuentaPresupuestariaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
