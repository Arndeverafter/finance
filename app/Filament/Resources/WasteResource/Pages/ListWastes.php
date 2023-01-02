<?php

namespace App\Filament\Resources\WasteResource\Pages;

use App\Filament\Resources\WasteResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWastes extends ListRecords
{
    protected static string $resource = WasteResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
