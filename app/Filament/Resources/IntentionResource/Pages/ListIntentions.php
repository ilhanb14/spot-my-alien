<?php

namespace App\Filament\Resources\IntentionResource\Pages;

use App\Filament\Resources\IntentionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListIntentions extends ListRecords
{
    protected static string $resource = IntentionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
