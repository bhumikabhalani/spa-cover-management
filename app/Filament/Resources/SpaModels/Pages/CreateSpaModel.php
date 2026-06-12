<?php

namespace App\Filament\Resources\SpaModels\Pages;

use App\Filament\Resources\SpaModelResource;
use App\Http\Requests\StoreSpaModelRequest;
use Filament\Resources\Pages\CreateRecord;

class CreateSpaModel extends CreateRecord
{
    protected static string $resource = SpaModelResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        return validator($data, app(StoreSpaModelRequest::class)->rules())->validate();
    }
}
