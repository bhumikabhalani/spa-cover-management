<?php

namespace App\Filament\Resources\Orders\Pages;

use App\Filament\Resources\OrderResource;
use App\Http\Requests\StoreOrderRequest;
use Filament\Resources\Pages\CreateRecord;

class CreateOrder extends CreateRecord
{
    protected static string $resource = OrderResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        return validator($data, app(StoreOrderRequest::class)->rules())->validate();
    }
}
