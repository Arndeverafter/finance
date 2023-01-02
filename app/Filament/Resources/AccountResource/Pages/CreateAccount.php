<?php

namespace App\Filament\Resources\AccountResource\Pages;

use App\Filament\Resources\AccountResource;
use App\Models\Account;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Exceptions\Halt;

class CreateAccount extends CreateRecord
{
    protected static string $resource = AccountResource::class;

    /**
     * @throws Halt
     */
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Check that the given category is not repeated for the given date
        if (Account::where('category_id', $data['category_id'])->where('date', $data['date'])->where('shop_id', $data['shop_id'])->exists()) {
            Notification::make()
                ->warning()
                ->title('Account Creation Failed')
                ->body('The chosen category is already set for the given Date.')
                ->duration(7000)
                ->send();
            $this->halt();
        }

        return $data;
    }
}
