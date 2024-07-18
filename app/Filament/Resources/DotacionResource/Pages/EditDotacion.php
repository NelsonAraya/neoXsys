<?php

namespace App\Filament\Resources\DotacionResource\Pages;

use App\Filament\Resources\DotacionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDotacion extends EditRecord
{
    protected static string $resource = DotacionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
