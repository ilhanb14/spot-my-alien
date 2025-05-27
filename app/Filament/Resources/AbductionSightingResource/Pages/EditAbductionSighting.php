<?php

namespace App\Filament\Resources\AbductionSightingResource\Pages;

use App\Filament\Resources\AbductionSightingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAbductionSighting extends EditRecord
{
    protected static string $resource = AbductionSightingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
