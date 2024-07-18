<?php

namespace App\Filament\Resources\ProfesionResource\Pages;

use App\Filament\Resources\ProfesionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProfesion extends EditRecord
{
    protected static string $resource = ProfesionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
