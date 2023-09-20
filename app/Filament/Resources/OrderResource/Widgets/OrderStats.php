<?php

namespace App\Filament\Resources\OrderResource\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\Concerns\InteractsWithPageTable;
use App\Filament\Resources\OrderResource\Pages\ListOrders;

class OrderStats extends StatsOverviewWidget
{
    use InteractsWithPageTable;

    protected static ?string $pollingInterval = null;

    protected function getTablePage(): string
    {
        return ListOrders::class;
    }

    protected function getStats(): array
    {
        return [
            Stat::make('Total orders', $this->getPageTableQuery()->count()),
            Stat::make('Confirmed Orders', $this->getPageTableQuery()->where('status', 'confirmed')->count()),
            Stat::make('Cancelled Orders', $this->getPageTableQuery()->where('status', 'cancelled')->count()),
        ];
    }
}
