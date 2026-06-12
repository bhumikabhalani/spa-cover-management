<?php

namespace App\Filament\Resources\SpaModels\Pages;

use App\Filament\Resources\SpaModelResource;
use App\Http\Requests\UpdateSpaModelRequest;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSpaModel extends EditRecord
{
    protected static string $resource = SpaModelResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        return validator($data, app(UpdateSpaModelRequest::class)->rules())->validate();
    }

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
