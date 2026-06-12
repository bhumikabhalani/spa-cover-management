<?php

namespace App\Filament\Resources\SpaModels\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ColorColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class SpaModelsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('width')
                    ->label('W')
                    ->suffix(' in')
                    ->sortable(),
                TextColumn::make('height')
                    ->label('H')
                    ->suffix(' in')
                    ->sortable(),
                TextColumn::make('corner_radius')
                    ->label('Radius')
                    ->suffix(' in')
                    ->sortable(),
                TextColumn::make('hinge_position')
                    ->searchable()
                    ->toggleable(),
                ColorColumn::make('color'),
                TextColumn::make('orders_count')
                    ->counts('orders')
                    ->label('Orders')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('hinge_position')
                    ->options(fn (): array => \App\Models\SpaModel::query()
                        ->whereNotNull('hinge_position')
                        ->distinct()
                        ->pluck('hinge_position', 'hinge_position')
                        ->all()),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
