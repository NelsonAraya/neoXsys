<?php

namespace App\Filament\Resources\BancoCuentaTipoResource\Pages;

use App\Filament\Resources\BancoCuentaTipoResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBancoCuentaTipo extends CreateRecord
{
    protected static string $resource = BancoCuentaTipoResource::class;

    protected function getRedirectUrl(): string {
        
        return $this->getResource()::getUrl('index');
    }
}
