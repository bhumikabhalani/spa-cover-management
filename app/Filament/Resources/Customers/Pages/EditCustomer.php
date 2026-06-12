<?php

namespace App\Filament\Resources\Customers\Pages;

use App\Filament\Resources\CustomerResource;
use App\Http\Requests\UpdateCustomerRequest;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditCustomer extends EditRecord
{
    protected static string $resource = CustomerResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        return validator($data, UpdateCustomerRequest::rulesFor($this->record->id))->validate();
    }

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
