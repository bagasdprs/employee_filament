<?php

namespace App\Filament\Resources\StatesResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatesStatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('All States', \App\Models\States::all()->count())
                ->description('Total number of states')
                ->icon('heroicon-o-building-office-2')
                ->color('primary'),
        ];
    }
}
