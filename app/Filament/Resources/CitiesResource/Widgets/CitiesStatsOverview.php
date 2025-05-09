<?php

namespace App\Filament\Resources\CitiesResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class CitiesStatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('All Cities', \App\Models\Cities::all()->count())
                ->description('Total number of cities')
                ->icon('heroicon-o-building-office-2')
                ->color('primary'),
        ];
    }
}
