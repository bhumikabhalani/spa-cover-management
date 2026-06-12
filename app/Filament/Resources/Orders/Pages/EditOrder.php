<?php

namespace App\Filament\Resources\Orders\Pages;

use App\Filament\Resources\OrderResource;
use App\Http\Requests\UpdateOrderRequest;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditOrder extends EditRecord
{
    protected static string $resource = OrderResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        return validator($data, app(UpdateOrderRequest::class)->rules())->validate();
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('downloadQuote')
                ->label('Download Quote PDF')
                ->icon('heroicon-o-document-arrow-down')
                ->color('success')
                ->url(fn (): string => route('orders.quote.download', $this->record)),
            DeleteAction::make(),
        ];
    }
}
