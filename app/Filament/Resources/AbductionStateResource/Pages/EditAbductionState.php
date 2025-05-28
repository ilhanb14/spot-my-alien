<?php

namespace App\Filament\Resources\AbductionStateResource\Pages;

use App\Filament\Resources\AbductionStateResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAbductionState extends EditRecord
{
    protected static string $resource = AbductionStateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
