<?php

namespace App\Filament\Resources\SpaModels\Pages;

use App\Filament\Resources\SpaModelResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSpaModels extends ListRecords
{
    protected static string $resource = SpaModelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
