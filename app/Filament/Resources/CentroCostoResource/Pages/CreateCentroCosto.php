<?php

namespace App\Filament\Resources\CentroCostoResource\Pages;

use App\Filament\Resources\CentroCostoResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCentroCosto extends CreateRecord
{
    protected static string $resource = CentroCostoResource::class;

    protected function getRedirectUrl(): string {
        
        return $this->getResource()::getUrl('index');
    }
}
