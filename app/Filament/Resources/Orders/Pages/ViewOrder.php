<?php

namespace App\Filament\Resources\Orders\Pages;

use App\Filament\Resources\OrderResource;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewOrder extends ViewRecord
{
    protected static string $resource = OrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('downloadQuote')
                ->label('Download Quote PDF')
                ->icon('heroicon-o-document-arrow-down')
                ->color('success')
                ->url(fn (): string => route('orders.quote.download', $this->record)),
            EditAction::make(),
            DeleteAction::make(),
        ];
    }
}
