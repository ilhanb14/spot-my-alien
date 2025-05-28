<?php

namespace App\Filament\Resources\IntentionResource\Pages;

use App\Filament\Resources\IntentionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIntention extends EditRecord
{
    protected static string $resource = IntentionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
