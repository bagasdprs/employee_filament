<?php

namespace App\Filament\Resources\EmployeesResource\Pages;

use App\Filament\Resources\EmployeesResource;
use App\Filament\Resources\EmployeesResource\Widgets\EmployeesStatsOverview;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEmployees extends ListRecords
{
    protected static string $resource = EmployeesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            EmployeesStatsOverview::class,
        ];
    }
}
