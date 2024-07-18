<?php

namespace App\Filament\Resources\PrevisionResource\Pages;

use App\Filament\Resources\PrevisionResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePrevision extends CreateRecord
{
    protected static string $resource = PrevisionResource::class;

    protected function getRedirectUrl(): string {
        
        return $this->getResource()::getUrl('index');
    }
}
