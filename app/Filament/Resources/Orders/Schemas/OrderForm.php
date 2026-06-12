<?php

namespace App\Filament\Resources\Orders\Schemas;

use App\Enums\OrderStatus;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class OrderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Order Details')
                    ->columns(2)
                    ->schema([
                        Select::make('customer_id')
                            ->relationship('customer', 'email')
                            ->getOptionLabelFromRecordUsing(fn ($record) => "{$record->full_name} ({$record->email})")
                            ->searchable(['first_name', 'last_name', 'email'])
                            ->preload()
                            ->required(),
                        Select::make('spa_model_id')
                            ->relationship('spaModel', 'name')
                            ->searchable()
                            ->preload()
                            ->required()
                            ->live(),
                        TextInput::make('quantity')
                            ->numeric()
                            ->required()
                            ->minValue(1)
                            ->default(1),
                        TextInput::make('foam_thickness')
                            ->numeric()
                            ->minValue(1)
                            ->suffix('in'),
                        ColorPicker::make('color')
                            ->required(),
                        Select::make('status')
                            ->options(OrderStatus::class)
                            ->default(OrderStatus::Draft)
                            ->required(),
                    ]),
            ]);
    }
}
