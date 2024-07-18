<?php

namespace App\Filament\Resources\ProveedorResource\Pages;

use App\Filament\Resources\ProveedorResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProveedor extends CreateRecord
{
    protected static string $resource = ProveedorResource::class;

    protected function getRedirectUrl(): string {
        
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Aplicar la validación del RUT
        if (isset($data['rut_completo'])) {
            $cleanRut = preg_replace('/[\.\-]/', '', $data['rut_completo']);
            $dv = substr($cleanRut, -1);
            $id = substr($cleanRut, 0, -1);
            
            // Asignar valores separados a los campos rut y dv
            $data['id'] = $id;
            $data['dv'] = $dv;
            }

        unset($data['rut_completo']); // Eliminar el campo rut_completo del arreglo de datos

        return $data;
    }
}
