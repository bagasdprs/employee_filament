<?php

namespace App\Filament\Resources\EmployeesResource\Pages;

use App\Filament\Resources\EmployeesResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateEmployees extends CreateRecord
{
    protected static string $resource = EmployeesResource::class;
    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }
}
