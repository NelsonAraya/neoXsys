<?php

namespace App\Filament\Resources\DotacionResource\Pages;

use App\Filament\Resources\DotacionResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateDotacion extends CreateRecord
{
    protected static string $resource = DotacionResource::class;

    protected function getRedirectUrl(): string {
        
        return $this->getResource()::getUrl('index');
    }
}
