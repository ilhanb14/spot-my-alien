<?php

namespace App\Filament\Resources\AlienSightingResource\Pages;

use App\Filament\Resources\AlienSightingResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAlienSightings extends ListRecords
{
    protected static string $resource = AlienSightingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
