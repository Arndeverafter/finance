<?php

namespace App\Filament\Resources\WasteResource\Pages;

use App\Filament\Resources\WasteResource;
use App\Models\Account;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWaste extends EditRecord
{
    protected static string $resource = WasteResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        // Get total costs of the waste incurred for this date
        $account = Account::find($data['account_id']);
        $total = ($account->set_price * $data['measure']) / $account->measure;
        $data['total'] = $total; // set the total cost of this waste

        return $data;
    }
}
