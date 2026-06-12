<?php

namespace App\Filament\Resources\Orders\Schemas;

use App\Services\SvgGeneratorService;
use Filament\Infolists\Components\ColorEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ViewEntry;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class OrderInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make()
                    ->columns([
                        'default' => 1,
                        'lg' => 3,
                    ])
                    ->schema([
                        Section::make('Order Information')
                            ->icon('heroicon-o-clipboard-document-list')
                            ->columnSpan([
                                'default' => 1,
                                'lg' => 2,
                            ])
                            ->columns(2)
                            ->schema([
                                TextEntry::make('customer.full_name')
                                    ->label('Customer'),
                                TextEntry::make('customer.email')
                                    ->label('Email')
                                    ->copyable()
                                    ->icon('heroicon-m-envelope'),
                                TextEntry::make('customer.phone')
                                    ->label('Phone')
                                    ->placeholder('N/A'),
                                TextEntry::make('customer.city')
                                    ->label('City')
                                    ->placeholder('N/A'),
                                TextEntry::make('spaModel.name')
                                    ->label('Spa Model')
                                    ->columnSpanFull(),
                                TextEntry::make('quantity')
                                    ->label('Quantity'),
                                TextEntry::make('foam_thickness')
                                    ->label('Foam Thickness')
                                    ->suffix(' in')
                                    ->placeholder('N/A'),
                                ColorEntry::make('color')
                                    ->label('Cover Color')
                                    ->copyable(),
                                TextEntry::make('status')
                                    ->badge(),
                            ]),
                        Section::make('Cover Preview')
                            ->icon('heroicon-o-eye')
                            ->columnSpan([
                                'default' => 1,
                                'lg' => 1,
                            ])
                            ->schema([
                                ViewEntry::make('cover_preview')
                                    ->hiddenLabel()
                                    ->view('filament.infolists.entries.order-cover-preview')
                                    ->state(fn ($record): array => [
                                        'svg' => app(SvgGeneratorService::class)->generate(
                                            $record->spaModel->width,
                                            $record->spaModel->height,
                                            $record->spaModel->corner_radius,
                                            $record->color,
                                        ),
                                        'width' => $record->spaModel->width,
                                        'height' => $record->spaModel->height,
                                        'corner_radius' => $record->spaModel->corner_radius,
                                        'color' => $record->color,
                                    ]),
                            ]),
                    ]),
            ]);
    }
}
