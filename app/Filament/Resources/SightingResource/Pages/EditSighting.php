<?php

namespace App\Filament\Resources\SightingResource\Pages;

use App\Filament\Resources\SightingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSighting extends EditRecord
{
    protected static string $resource = SightingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
