<?php

namespace App\Filament\Resources\DotacionResource\Pages;

use App\Filament\Resources\DotacionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDotacions extends ListRecords
{
    protected static string $resource = DotacionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
