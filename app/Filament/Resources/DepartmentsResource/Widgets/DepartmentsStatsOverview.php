<?php

namespace App\Filament\Resources\DepartmentsResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DepartmentsStatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('All Departments', \App\Models\Departments::all()->count())
                ->description('Total number of departments')
                ->icon('heroicon-o-building-office-2')
                ->color('primary'),
        ];
    }
}
