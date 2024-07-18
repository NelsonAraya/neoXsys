<?php

namespace App\Filament\Resources\AfpResource\Pages;

use App\Filament\Resources\AfpResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAfp extends EditRecord
{
    protected static string $resource = AfpResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
