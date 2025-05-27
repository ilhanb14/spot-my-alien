<?php

namespace App\Filament\Resources\AbductionStateResource\Pages;

use App\Filament\Resources\AbductionStateResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAbductionStates extends ListRecords
{
    protected static string $resource = AbductionStateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
