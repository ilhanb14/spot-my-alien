<?php

namespace App\Filament\Resources\UfoSightingResource\Pages;

use App\Filament\Resources\UfoSightingResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUfoSightings extends ListRecords
{
    protected static string $resource = UfoSightingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
