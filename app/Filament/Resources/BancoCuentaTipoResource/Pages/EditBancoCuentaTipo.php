<?php

namespace App\Filament\Resources\BancoCuentaTipoResource\Pages;

use App\Filament\Resources\BancoCuentaTipoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBancoCuentaTipo extends EditRecord
{
    protected static string $resource = BancoCuentaTipoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
