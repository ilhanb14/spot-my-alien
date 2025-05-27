<?php

namespace App\Filament\Resources\AlienShapeResource\Pages;

use App\Filament\Resources\AlienShapeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAlienShape extends EditRecord
{
    protected static string $resource = AlienShapeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
