<?php

namespace App\Filament\Widgets;

use App\Enums\OrderStatus;
use App\Models\Customer;
use App\Models\Order;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        return [
            Stat::make('Total Customers', Customer::count())
                ->description('Registered customers')
                ->descriptionIcon('heroicon-m-users')
                ->color('primary'),
            Stat::make('Total Orders', Order::count())
                ->description('All orders')
                ->descriptionIcon('heroicon-m-clipboard-document-list')
                ->color('info'),
            Stat::make('Draft Orders', Order::where('status', OrderStatus::Draft)->count())
                ->description('Awaiting production')
                ->descriptionIcon('heroicon-m-pencil-square')
                ->color('gray'),
            Stat::make('Production Orders', Order::where('status', OrderStatus::Production)->count())
                ->description('Currently in production')
                ->descriptionIcon('heroicon-m-cog-6-tooth')
                ->color('warning'),
            Stat::make('Shipped Orders', Order::where('status', OrderStatus::Shipped)->count())
                ->description('Completed shipments')
                ->descriptionIcon('heroicon-m-truck')
                ->color('success'),
        ];
    }
}
