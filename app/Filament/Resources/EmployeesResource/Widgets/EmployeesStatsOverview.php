<?php

namespace App\Filament\Resources\EmployeesResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Employees;
use App\Models\Countries;

class EmployeesStatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $idn = Countries::where('country_code', 'Indonesia')->withCount('employees')->first();
        $jpn = Countries::where('country_code', 'Japan')->withCount('employees')->first();
        $kor = Countries::where('country_code', 'Korea')->withCount('employees')->first();
        $usa = Countries::where('country_code', 'USA')->withCount('employees')->first();
        $uk = Countries::where('country_code', 'UK')->withCount('employees')->first();
        return [
            Stat::make('All Employees', Employees::all()->count())
                ->description('Total number of employees')
                ->icon('heroicon-o-user-group')
                ->color('primary'),
            // Stat::make($idn->name . 'Employees', $idn->employees_count)
        ];
    }
}
