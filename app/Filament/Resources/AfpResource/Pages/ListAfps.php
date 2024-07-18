<?php

namespace App\Filament\Resources\AfpResource\Pages;

use App\Filament\Resources\AfpResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAfps extends ListRecords
{
    protected static string $resource = AfpResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
