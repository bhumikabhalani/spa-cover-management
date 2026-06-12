<?php

namespace App\Filament\Resources\Orders\Tables;

use App\Enums\OrderStatus;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class OrdersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('#')
                    ->sortable(),
                TextColumn::make('customer.full_name')
                    ->label('Customer')
                    ->searchable(['first_name', 'last_name', 'email'])
                    ->sortable(),
                TextColumn::make('spaModel.name')
                    ->label('Spa Model')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('quantity')
                    ->sortable(),
                TextColumn::make('color')
                    ->badge(),
                TextColumn::make('status')
                    ->badge()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                SelectFilter::make('status')
                    ->options(OrderStatus::class),
                SelectFilter::make('customer_id')
                    ->relationship('customer', 'email')
                    ->getOptionLabelFromRecordUsing(fn ($record) => $record->full_name)
                    ->searchable(['first_name', 'last_name', 'email'])
                    ->preload()
                    ->label('Customer'),
                SelectFilter::make('spa_model_id')
                    ->relationship('spaModel', 'name')
                    ->searchable()
                    ->preload()
                    ->label('Spa Model'),
            ])
            ->recordActions([
                ViewAction::make(),
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
