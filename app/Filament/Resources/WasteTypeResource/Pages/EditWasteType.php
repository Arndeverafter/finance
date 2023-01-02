<?php

namespace App\Filament\Resources\WasteTypeResource\Pages;

use App\Filament\Resources\WasteTypeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWasteType extends EditRecord
{
    protected static string $resource = WasteTypeResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
