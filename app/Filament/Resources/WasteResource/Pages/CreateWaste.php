<?php

namespace App\Filament\Resources\WasteResource\Pages;

use App\Filament\Resources\WasteResource;
use App\Models\Account;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Exceptions\Halt;

class CreateWaste extends CreateRecord
{
    protected static string $resource = WasteResource::class;

    /**
     * @throws Halt
     */
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Get total costs of the waste incurred for this date
        $account = Account::find($data['account_id']);
        $total = ($account->set_price * $data['measure']) / $account->measure;
        $data['total'] = $total; // set the total cost of this waste

        return $data;
    }
}
