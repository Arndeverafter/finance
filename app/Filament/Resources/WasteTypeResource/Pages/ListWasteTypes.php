<?php

namespace App\Filament\Resources\WasteTypeResource\Pages;

use App\Filament\Resources\WasteTypeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWasteTypes extends ListRecords
{
    protected static string $resource = WasteTypeResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
