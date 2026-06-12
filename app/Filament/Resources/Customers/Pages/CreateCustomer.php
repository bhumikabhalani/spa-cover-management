<?php

namespace App\Filament\Resources\Customers\Pages;

use App\Filament\Resources\CustomerResource;
use App\Http\Requests\StoreCustomerRequest;
use Filament\Resources\Pages\CreateRecord;

class CreateCustomer extends CreateRecord
{
    protected static string $resource = CustomerResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        return validator($data, app(StoreCustomerRequest::class)->rules())->validate();
    }
}
