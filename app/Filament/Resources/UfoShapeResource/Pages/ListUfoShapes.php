<?php

namespace App\Filament\Resources\UfoShapeResource\Pages;

use App\Filament\Resources\UfoShapeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUfoShapes extends ListRecords
{
    protected static string $resource = UfoShapeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
