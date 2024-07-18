<?php

namespace App\Filament\Resources\CuentaPresupuestariaResource\Pages;

use App\Filament\Resources\CuentaPresupuestariaResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCuentaPresupuestaria extends CreateRecord
{
    protected static string $resource = CuentaPresupuestariaResource::class;

    protected function getRedirectUrl(): string{
        
        return $this->getResource()::getUrl('index');
    }
}
