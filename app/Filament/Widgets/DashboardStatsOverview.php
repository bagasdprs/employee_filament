<?php

namespace App\Filament\Widgets;

use App\Models\Employees;
use App\Models\Countries;
use App\Models\Cities;
use App\Models\States;
use App\Models\Departments;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DashboardStatsOverview extends BaseWidget
{
    protected static ?string $pollingInterval = null; // optional: auto refresh

    protected function getStats(): array
    {
        return [
            Stat::make('Total Employees', Employees::count())
                ->icon('heroicon-o-user-group')
                ->color('primary'),

            Stat::make('Total Countries', Countries::count())
                ->icon('heroicon-o-globe-alt')
                ->color('success'),

            Stat::make('Total Cities', Cities::count())
                ->icon('heroicon-o-building-office')
                ->color('info'),

            Stat::make('Total States', States::count())
                ->icon('heroicon-o-map')
                ->color('warning'),

            Stat::make('Total Departments', Departments::count())
                ->icon('heroicon-o-briefcase')
                ->color('danger'),
        ];
    }
}
