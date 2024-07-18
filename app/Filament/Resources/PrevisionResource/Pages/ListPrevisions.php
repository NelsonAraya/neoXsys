<?php

namespace App\Filament\Resources\PrevisionResource\Pages;

use App\Filament\Resources\PrevisionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPrevisions extends ListRecords
{
    protected static string $resource = PrevisionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
