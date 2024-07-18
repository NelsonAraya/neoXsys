<?php

namespace App\Filament\Resources\AfpResource\Pages;

use App\Filament\Resources\AfpResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAfp extends CreateRecord
{
    protected static string $resource = AfpResource::class;

    protected function getRedirectUrl(): string {
        
        return $this->getResource()::getUrl('index');
    }
}
