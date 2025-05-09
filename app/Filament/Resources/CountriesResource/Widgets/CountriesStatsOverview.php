<?php

namespace App\Filament\Resources\CountriesResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class CountriesStatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('All Countries', \App\Models\Countries::all()->count())
                ->description('Total number of countries')
                ->icon('heroicon-o-globe-alt')
                ->color('primary'),
            // Stat::make($idn->name . 'Countries', $idn->countries_count)
        ];
    }
}
