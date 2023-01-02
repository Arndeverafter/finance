<?php

namespace App\Filament\Resources\DiscountResource\Pages;

use App\Filament\Resources\DiscountResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDiscount extends EditRecord
{
    /**
     * @var string
     */
    protected static string $resource = DiscountResource::class;

    /**
     * @return array
     * @throws \Exception
     */
    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    /**
     * @param array $data
     * @return array
     */
    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['total']  = $data['amount']  * $data['measure'];

        return $data;
    }
}
