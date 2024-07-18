<?php

namespace App\Filament\Resources\PrevisionResource\Pages;

use App\Filament\Resources\PrevisionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPrevision extends EditRecord
{
    protected static string $resource = PrevisionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
