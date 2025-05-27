<?php

namespace App\Filament\Resources\AlienSightingResource\Pages;

use App\Filament\Resources\AlienSightingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAlienSighting extends EditRecord
{
    protected static string $resource = AlienSightingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
