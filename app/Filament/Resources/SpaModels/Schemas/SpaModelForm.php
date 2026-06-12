<?php

namespace App\Filament\Resources\SpaModels\Schemas;

use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class SpaModelForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Spa Model Details')
                    ->columns(2)
                    ->schema([
                        TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),
                        TextInput::make('width')
                            ->numeric()
                            ->required()
                            ->minValue(1)
                            ->suffix('in'),
                        TextInput::make('height')
                            ->numeric()
                            ->required()
                            ->minValue(1)
                            ->suffix('in'),
                        TextInput::make('corner_radius')
                            ->numeric()
                            ->required()
                            ->minValue(0)
                            ->default(0)
                            ->suffix('in'),
                        TextInput::make('hinge_position')
                            ->maxLength(255),
                        ColorPicker::make('color')
                            ->required(),
                        Textarea::make('description')
                            ->rows(4)
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
