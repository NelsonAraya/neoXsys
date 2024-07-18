<?php

namespace App\Filament\Resources\ProfesionResource\Pages;

use App\Filament\Resources\ProfesionResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProfesion extends CreateRecord
{
    protected static string $resource = ProfesionResource::class;

    protected function getRedirectUrl(): string {
        
        return $this->getResource()::getUrl('index');
    }
}
